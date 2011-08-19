<?php

	//database connection
	mysql_connect("dedi1082.nur4.host-h.net", "metebb_3", "H4Wjjk58");
	@mysql_select_db("metebquote") or die( "Unable to select database");

	
	function array_to_text($array)
	{
	//This function converts an array of values into a single string
		$text="";
		foreach ($array as $element)
		{
			$text .= "{" . $element . "}";

		}
		return $text;
	}

	function matrix_to_text($matrix)
	{
	//This function converts a matrix of values into a single string
		$text="";
		foreach ($matrix as $element)
		{
			$text .= "(" . array_to_text($element) . ")";
		}
		return $text;
	}

	function text_to_array($text)
	{
	//This function converts a string back to an array of values
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
	//This function converts a string back to a matrix of values
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

	function get_latest_marketdata(&$upload_date, &$inception_date, &$month_array, &$discounting_array, &$dhfactors_matrix)
	{
	//This function retrieves the latest market data from the database
	//Only the last row of data is retrieved
	//The market data is required to do a quote


		$sql = "SELECT * FROM marketdata WHERE marketdataid=(SELECT max(marketdataid) FROM marketdata )";
		$result = mysql_query($sql);
		while ($row = mysql_fetch_assoc($result)) 
		{
			$upload_date = $row['upload_date'];
			$inception_date = $row['inception_date'];
			$month_array = text_to_matrix($row['month_array']);//the array of month values from the database
			$discounting_array = text_to_matrix($row['discounting_array']);//the array of discounting values from the database
			$dhfactors_matrix = text_to_matrix($row['dhfactors_matrix']);//the matrix of dhfactors values from the database
		}
	}

	function get_expenses(&$renewal_expenses, &$expense_inflation, &$initial_expenses, &$loadings)
	{
	//This function retreives the expense data from the database
	//There should only be one line of data, so only the one row is read

		$sql = "SELECT * FROM expensedata WHERE expensedataid=1";
		$result = mysql_query($sql);
		$row = mysql_fetch_assoc($result);
		$renewal_expenses = $row['renewal_expenses'];
		$expense_inflation = $row['expense_inflation'];
		$initial_expenses = $row['initial_expenses'];
		$loadings = $row['loadings'];
	}

	function get_mortality_rates(&$rates)
	{
	//This function retrieves the mortality rates from the database
	//The mortality rates are in the form of a table of male and female rates sorted by age
	//The PA90-1 tables were used

		$place=0;
		$sql = "SELECT * FROM mortality_rates";
		$result = mysql_query($sql);
		while ($row = mysql_fetch_assoc($result)) 
		{
			$rates[$place][1] = $row['age'];
			$rates[$place][2] = $row['mortality_male'];
			$rates[$place][3] = $row['mortality_female'];
			$place++;
		}
	}

	function calc_pp($main_sex, $main_dob, $second_life, $spouse_sex, $spouse_dob, $gp, $spouse_rev, $pri, $annuity)
	{
	//This function does a quote and calculates a purchase price from an annuity amount
	//No allowance is made for commission and tax
	
	//The required data is read from the database

		get_latest_marketdata($upload_date, $inception_date, $month_array, $discounting_array, $dhfactors_matrix);
		get_expenses($renewal_expenses, $expense_inflation, $initial_expenses, $loadings);
		get_mortality_rates($rates);
		$max_age=112;

	//The calculations are performed. These are based on an excel spreadsheet called "quotes engine.xlsx". Contact the administrator for more info.
	//The calculations are done in the form of a table. This represents the spreadsheet from which the calculations are based.
	//The number of rows depends on how fast the probability of survival reduces to zero.

		if ($annuity<=40000)
			$age_rating=-1;
		else
			$age_rating=-2;
		if ($main_sex=="M")
			$main_sex=2;
		else
			$main_sex=3;
		if ($spouse_sex=="M")
			$spouse_sex=2;
		else
			$spouse_sex=3;
		if ($annuity<=20000)
			$mortality_improvement=0.005;
		elseif ($annuity<=40000)
			$mortality_improvement=0.015;
		else
			$mortality_improvement=0.01;
		$main_dob=(strtotime($main_dob)+2209168800)/86400;
		$spouse_dob=(strtotime($spouse_dob)+2209168800)/86400;
		if ($pri==0.035)
			$column=1;
		elseif ($pri==0.040)
			$column=2;
		elseif ($pri==0.045)
			$column=3;

		$calcs[0][1]=(strtotime($inception_date)+2209168800)/86400-365.25/12;
		$calcs[0][2]=min(floor(($month_array[1][$column]-$main_dob)/365.25+$age_rating),$max_age);
		$calcs[0][8]=1;
		$calcs[0][9]=1;
		$calcs[0][14]=1;
		$calcs[0][17]=min(floor(($month_array[1][$column]-$spouse_dob)/365.25+$age_rating),$max_age);
		$calcs[0][21]=1;
		$calcs[0][22]=1;
		$calcs[0][29]=0;

		for ($row=1; $row<=1200; $row++)
		{
			$calcs[$row][1]=$calcs[$row-1][1]+365.25/12;
			$calcs[$row][2]=min(floor(($calcs[$row][1]-$main_dob)/365.25+$age_rating),$max_age);
			$calcs[$row][3]=$annuity;
			$calcs[$row][4]=$renewal_expenses * 1.14;
			$calcs[$row][5]=$rates[$calcs[$row][2]][$main_sex];
			if ($calcs[$row][5]==1)
				$calcs[$row][6]=1;
			else
				$calcs[$row][6]=pow(1-$mortality_improvement,$row/12);
			$calcs[$row][7]=$calcs[$row][5]*$calcs[$row][6];
			if ($calcs[$row][2]==$calcs[$row-1][2])
				$calcs[$row][8]=$calcs[$row-1][8];
			else
				$calcs[$row][8]=$calcs[$row-1][8]*$calcs[$row-1][9];
			if ($calcs[$row][2]==$calcs[$row-1][2])
				$calcs[$row][9]=$calcs[$row-1][9]-$calcs[$row][7]/12;
			else
				$calcs[$row][9]=1-$calcs[$row][7]/12;
			if ($row<=$gp)
				$calcs[$row][10]=1;
			else
				$calcs[$row][10]=$calcs[$row][8]*$calcs[$row][9];
			$calcs[$row][10]=max($calcs[$row][10],0);
			$calcs[$row][11]=$calcs[$row][3]*$calcs[$row][10];
			if ($row<=360)
				$calcs[$row][12]=$dhfactors_matrix[$row][$column]*$discounting_array[$row][$column];
			else
				$calcs[$row][12]=$dhfactors_matrix[360][$column]*$discounting_array[360][$column]*pow(1+$pri,(360-$row)/12);
			$calcs[$row][13]=$calcs[$row][4]*$calcs[$row][10];
			//deterministic expense inflation ignored for now
			$calcs[$row][15]=$calcs[$row][11]+$calcs[$row][13];

			$calcs[$row][16]=$calcs[$row][3]*$spouse_rev*$second_life;
			$calcs[$row][17]=min(floor(($calcs[$row][1]-$spouse_dob)/365.25+$age_rating),$max_age);
			$calcs[$row][18]=$rates[$calcs[$row][17]][$spouse_sex];
			if ($calcs[$row][18]==1)
				$calcs[$row][19]=1;
			else
				$calcs[$row][19]=pow(1-$mortality_improvement,$row/12);
			$calcs[$row][20]=$calcs[$row][18]*$calcs[$row][19];
			if ($calcs[$row][17]==$calcs[$row-1][17])
				$calcs[$row][21]=$calcs[$row-1][21];
			else
				$calcs[$row][21]=$calcs[$row-1][21]*$calcs[$row-1][22];
			if ($calcs[$row][17]==$calcs[$row-1][17])
				$calcs[$row][22]=$calcs[$row-1][22]-$calcs[$row][20]/12;
			else
				$calcs[$row][22]=1-$calcs[$row][20]/12;
			$calcs[$row][23]=1-$calcs[$row][10];
			$calcs[$row][24]=max($calcs[$row][21]*$calcs[$row][22]*$calcs[$row][23],0);
			$calcs[$row][25]=$calcs[$row][16]*$calcs[$row][24];
			$calcs[$row][26]=$calcs[$row][4]*$calcs[$row][24];
			$calcs[$row][27]=$calcs[$row][25]+$calcs[$row][26];
			$calcs[$row][28]=($calcs[$row][15]+$calcs[$row][27])*$calcs[$row][12];
			$calcs[$row][29]=$calcs[$row-1][29]+$calcs[$row][28];

			if ($calcs[$row][28]==0)
			{
				$calcs[1200][29]=$calcs[$row][29];
				$row=1200;
			}
		}

	//The purchase is returned. This makes allowance for expenses and loadings

		return ($calcs[1200][29]+$initial_expenses*1.14)/(1-$loadings*1.14);
	}

	function calc_annuity($main_sex, $main_dob, $second_life, $spouse_sex, $spouse_dob, $gp, $spouse_rev, $pri, $pp)
	{
	//This function calculates the annuity amount that can be purchased given a purchase amount
	//No allowance is made for commission and tax
	//A Newton-Rhapson approximation method is used. Convergence usually occurs after 2 iterations
	//An unnecessary third iteration is usually performed, but this adds accuracy.

		$shock=0.00001;
		$runs=0;
		$annuity=$pp/12/15;
		$diff=1;
		
		while (abs($diff)>0.01 and $runs<=10)
		{
			$pp1=calc_pp($main_sex, $main_dob, $second_life, $spouse_sex, $spouse_dob, $gp, $spouse_rev, $pri, $annuity);
			$pp2=calc_pp($main_sex, $main_dob, $second_life, $spouse_sex, $spouse_dob, $gp, $spouse_rev, $pri, $annuity + $shock);
			$diff=$pp-$pp1;
			$annuity=$annuity+$diff/(($pp2-$pp1)/$shock);
			$runs++;
		}
		if ($runs<=10)
			return $annuity;
		else
			return "error";
	}

	function get_tax_rates()
	{
	//This function retrieves the tax rates from the database
	//These tax rates will need to be updated every year. The tax rates are valid from 1 March until 28 Feb of the next year.

		$place=0;
		$sql = "SELECT * FROM tax_rates";
		$result = mysql_query($sql);
		while ($row = mysql_fetch_assoc($result)) 
		{
			$tax_rates[$place][1] = $row['tax_rate'];
			$tax_rates[$place][2] = $row['start_bracket'];
			$place++;
		}

		return $tax_rates;
	}

	function get_tax_rebates()
	{
	//This function retrieves the tax rebates from the database
	//These tax rebates will need to be updated every year. The tax rebates are valid from 1 March until 28 Feb of the next year.

		$place=0;
		$sql = "SELECT * FROM tax_rebates";
		$result = mysql_query($sql);
		while ($row = mysql_fetch_assoc($result)) 
		{
			$tax_rebates[$place][1] = $row['age'];
			$tax_rebates[$place][2] = $row['rebate'];
			$place++;
		}

		return $tax_rebates;
	}

	function calc_net_annuity($main_dob, $annuity)
	{
	//This function calculates the net (of tax) initial annuity amount from the gross initial annuity
	//It gets the tax rates and rebates from the database (which must be updated every year)

		$tax_rates=get_tax_rates();
		$tax_rebates=get_tax_rebates();
		get_latest_marketdata($upload_date, $inception_date, $month_array, $discounting_array, $dhfactors_matrix);

		$tax_rates[0][3]=0;
		for ($pos=1; $pos<=count($tax_rates)-1; $pos++)
			$tax_rates[$pos][3]=$tax_rates[$pos-1][3]+$tax_rates[$pos-1][1]*($tax_rates[$pos][2]-$tax_rates[$pos-1][2]);

		$annual_annuity=$annuity*12;
		$main_dob=(strtotime($main_dob)+2209168800)/86400;
		$age=floor(($month_array[1][1]-$main_dob)/365.25);
		
		$tax_before_rebate=0;
		for ($pos=0; $pos<=count($tax_rates)-2; $pos++)
			$tax_before_rebate=$tax_before_rebate+(($tax_rates[$pos][2]<$annual_annuity)*$tax_rates[$pos][1]*(min($tax_rates[$pos+1][2],$annual_annuity)-$tax_rates[$pos][2]));
		$rebate=0;
		for ($pos=1; $pos<=count($tax_rebates)-1; $pos++)
			$rebate=$rebate+(($age>=$tax_rebates[$pos-1][1] && $age<$tax_rebates[$pos][1])*$tax_rebates[$pos][2]);
		$tax_after_rebate=max($tax_before_rebate-$rebate,0);

		return ($annual_annuity-$tax_after_rebate)/12;
	}

	function calc_commission($pp, $commission, $net_to_gross=0)
	{
	//This function can be used to insert or remove commission to the purchase price
	//If net_to_gross is zero, then commission is added (eg R1000 goes to R1015.23)
	//If net_to_gross is one, then commission is removed (eg R1000 goes to R985)

		if ($net_to_gross==0)
			return $pp/(1-$commission); 
		else
			return $pp*(1-$commission);
	}

	$ans=calc_annuity($_POST[main_sex], $_POST[main_dob], $_POST[second_life], $_POST[spouse_sex], $_POST[spouse_dob], $_POST[gp], $_POST[spouse_rev], $_POST[pri], calc_commission($_POST[pp],0.015,1));


	echo "<br>"."<br>".$_POST[main_sex]."<br>".$_POST[main_dob]."<br>".$_POST[second_life]."<br>".$_POST[spouse_sex]."<br>".$_POST[spouse_dob]."<br>".$_POST[gp]."<br>".$_POST[spouse_rev]."<br>".$_POST[pri]."<br>".$_POST[pp];
	echo "<br><br>Purchases a gross annuity of: ".$ans;
	echo "<br><br>Purchases a net annuity of: ".calc_net_annuity($_POST[main_dob], $ans);
	
	mysql_close();//close the database connection
	
?>