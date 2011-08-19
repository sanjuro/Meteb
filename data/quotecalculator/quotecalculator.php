<p>The time is:<br>

<?php

	//database connection
	mysql_connect("dedi1082.nur4.host-h.net", "ebannngwrb_2", "QDmRnS98");
	@mysql_select_db("ebannngwrb_db2") or die( "Unable to select database");

	
	function array_to_text($array)
	{
		$text="";
		foreach ($array as $element)
		{
			$text .= "{" . $element . "}";
		}
		return $text;
	}

	function matrix_to_text($matrix)
	{
		$text="";
		foreach ($matrix as $element)
		{
			$text .= "(" . array_to_text($element) . ")";
		}
		return $text;
	}

	function text_to_array($text)
	{
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

	function text_to_matrix($text)
	{
		$place=1;

		while (strpos($text,")")>0)
		{
			$start = strpos($text,"(")+1;
			$length = strpos($text,")") - $start;
			$array[$place] = text_to_array(substr($text, $start, $length));
			$text = substr($text, $start + $length + 1);
			$place=$place+1;
		}
		
		return $array;
	}

	function write_test()
	{
		$name[1][1] = "A";
		$name[1][2] = "B";
		$name[1][3] = "C";
		$name[2][1] = "a";
		$name[2][2] = "b";
		$name[2][3] = "c";

		$test = text_to_matrix(matrix_to_text($name));
		//$test = text_to_array(array_to_text($name));

		echo "<br>";
		echo $test[1][1];
		echo $test[1][2];
		echo $test[1][3];
		echo $test[2][1];
		echo $test[2][2];
		echo $test[2][3];
		echo "<br>done";

		$sql = "INSERT INTO test VALUES(7,'name',23)";
		$result = mysql_query($sql);
	}

	function write_marketdata($upload_date, $inception_date, $month_array, $discounting_array, $dhfactors_matrix)
	{
		$month_array = matrix_to_text($month_array);
		$discounting_array = matrix_to_text($discounting_array);
		$dhfactors_matrix = matrix_to_text($dhfactors_matrix);

		$sql = "INSERT INTO marketdata (upload_date, inception_date, month_array, discounting_array, dhfactors_matrix) 
			VALUES('$upload_date', '$inception_date', '$month_array', '$discounting_array', '$dhfactors_matrix')";
		$result = mysql_query($sql);
	}

	$abc = date("Y/m/d h:i:s");
	echo $abc;

	for ($pos_x=1; $pos_x<=360; $pos_x++)
	{
		for ($pos_y=1; $pos_y<=3; $pos_y++)
		{
			$mon[$pos_x][$pos_y] = $pos_y+$pos_x/1000;
		}
	}

	//write_marketdata("2011-05-13","2011-06-01",$mon,$mon,$mon);

	
	//$uploaddate variable will be populated with the current date in format 2011-01-01
	$upload_date = date("Y-m-d");
	//the following query will get the record for the date '2011-01-01'
	$sql = "SELECT * FROM marketdata WHERE upload_date = '$upload_date'"; 
	$result = mysql_query($sql);
	//while ($row = mysql_fetch_assoc($result)) 
	//{
		//$month_array = $row['month_array'];//the array of month values from the database
		//$discounting_array = $row['discounting_array'];//the array of discounting values from the database
		//$dhfactors_matrix = $row['dhfactors_matrix'];//the matrix of dhfactors values from the database
		
		//print / output the values
		//echo $month_array . "<br>";
		//echo $discounting_array . "<br>";
		//echo $dhfactors_matrix . "<br>";
	//}
	
	mysql_close();//close the database connection
	
?>