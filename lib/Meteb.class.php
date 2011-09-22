<?php
/**
 * Meteb Utillity Class
 * 
 * This class house some utillity functions for the system
 * 
 * @package    meteb
 * @subpackage lib
 * @author     Shadley Wentzel <shad6ster@gmail.com>
 * @version    GIT
 */
class Meteb
{
	/**
	 * Function to slugify a text string
	 *
	 * @param varchar $text
	 */
	public static function slugify($text)
	{
    	// replace all non letters or digits by -
    	$text = preg_replace('/\W+/', '-', $text);
 
    	// trim and lowercase
    	$text = strtolower(trim($text, '-'));
 
    	return $text;
	}
  
	/**
	 * Fucntion to clean a string of unwated characters
	 *
	 * @param varchar $text
	 */
	public static function clean($text)
	{
    	// replace all non letters or digits by -
    	$text = preg_replace('/\W+/', '', $text);
 
    	// trim and lowercase
    	$text = strtolower(trim($text, '-'));
 
    	return $text;
	}
  
	/**
	 * Trace function used to echo and break flow
	 *
	 * @param variant $check
	 */
	public static function TKO($check) {
		echo '<pre>';
		print_r($check);
		exit;
	}
	
	/**
	 * This function converts a string back to a matrix of values
	 *
	 * @param varcahr $text
	 * @return array Values broken into an array
	 */
	public static function text_to_matrix($text)
	{
		$place = 1;

		$array = '';
		
		while (strpos($text,")")>0)
		{
			$start = strpos($text,"(")+1;
			$length = strpos($text,")") - $start;
			$array[$place] = Meteb::text_to_array(substr($text, $start, $length));
			$text = substr($text, $start + $length + 1);
			$place = $place+1;
		}
		
		return $array;
	}
	
	/**
	 * This function converts a string back to a matrix of values
	 *
	 * @param varchar $text
	 * @return array Values broken into an array
	 */
	public static function text_to_array($text)
	{	
		/* 
		$text = preg_replace('/{(.*?)}/', '$1_', $text);
		$result = explode("_", $text);
		
		return $result;
		*/
		$place=1;

		while (strpos($text,"}")>0)
		{
			$start = strpos($text,"{")+1;
			$length = strpos($text,"}") - $start;
			$array[$place] = substr($text, $start, $length);
			$text = substr($text, $start + $length + 1);
			$place=$place+1;
		}

		return $array;
		
	}
	
	/**
	 * Function to find the last business day of a month
	 *
	 * This function returns the last business day in the form of
	 * a date	
	 *
	 *
	 * @param integer $month Month to calculate one
	 * @param integer $year  Year to calculate one
	 * @return integer Unix Timestamp of last day of month
	 */
	public static function last_business_day($month, $year) {
		$lbd = cal_days_in_month(CAL_GREGORIAN, $month, $year);
		$wday = date("N", strtotime("$year-$month-$lbd"));

		$lbd = "$year-$month-$lbd";

		return $lbd;
	}
	
	/**
	 * This function the age from a date
	 *
	 * @param datetime $birthday Date of Birth
	 * @return integer age calculated
	 */
	public static function getAge ($birthday)
	{
	    list($year,$month,$day) = explode("-",$birthday);
	    $year_diff  = date("Y") - $year;
	    $month_diff = date("m") - $month;
	    $day_diff   = date("d") - $day;
	    if ($day_diff < 0 || $month_diff < 0)
	      $year_diff--;
	    return $year_diff;
    }
    
    
    /**
	 *
	 *
	 * @param date $date1
	 * @param date $date2
	 * @return string
	 */
    public static function getMonthsBetweenDates($date1, $date2) {
        $time1  = $date1;
        $time2  = $date2;
        $my     = date('My', $time2);

        //$months = array(date('mY', $time1));
        $f      = '';
		
        while ($time1 < $time2) {
            $time1 = strtotime((date('Y-m-d', $time1).' +15days'));
            if (date('F', $time1) != $f) {
                $f = date('F', $time1);
                if (date('My', $time1) != $my && ($time1 < $time2))
                $months[] = date('My', $time1);
            }
        }

        $months[] = date('My', $time2);
        return $months;
    }
}
?>