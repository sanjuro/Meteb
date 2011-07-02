<?php
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
}
?>