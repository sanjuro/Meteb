<?php

/**
 * Meteb Quote Class
 * 
 * This class will handle the business logic for the quote
 * 
 * @package    meteb
 * @subpackage lib
 * @author     Shadley Wentzel
 * @version    GIT
 */
class MetebQuote
{

	
	/**
	 * Function to calculate the commission for a quote
	 * 
	 * @param double $pp Purchase Price for quote
	 * @param double $commission Commission Percentage for quote
	 * @param integer $net_to_gross Net Gross
	 * 
	 * @return double Purchase Price
	 */	
	public function calc_commission($pp, $commission, $net_to_gross=0)
	{
	/**
	 * This function can be used to insert or remove commission to the purchase price
	 * If net_to_gross is zero, then commission is added (eg R1000 goes to R1015.23)
	 * If net_to_gross is one, then commission is removed (eg R1000 goes to R985)
	 */

		if ($net_to_gross == 0)
			return $pp/(1-$commission); 
		else
			return $pp*(1-$commission);
	}

	
	/**
	 * This function calculates the age-last-birthday of a person
	 * The age is calculated from $birthday to $to_date
	 * 
	 * @param date $birthday Date of Birth
	 * @param date $to_date Date of full term of quote
	 * 
	 * @return integer Age calculate
	 */	
  	public static function calc_age($birthday, $to_date)
	{	
		list($year1,$month1,$day1) = explode("-",$birthday);
		list($year2,$month2,$day2) = explode("-",$to_date);
    		$year_diff  = $year2 - $year1;
    		$month_diff = $month2 - $month1;
    		$day_diff   = $day2 - $day1;
    		if ($day_diff < 0 || $month_diff < 0)
      		$year_diff--;
    		return $year_diff;
    }
			
    
    
	/**
	 * This function calculates the annuity amount that can be purchased given a purchase amount
	 * No allowance is made for commission and tax
	 * A Newton-Rhapson approximation method is used. Convergence usually occurs after 2 iterations
	 * An unnecessary third iteration is usually performed, but this adds accuracy.
	 * 
	 * @param quote quote The quote that needs to be generated
	 * @param double $pri The PRI for the quote
	 * @param double $pp The Purchase Price for the quote
	 * 
	 * @return UserProfile UserProfile Object
	 */	
	public static function calc_annuity($quote, $pri, $pp)
	{
		$shock = 0.00001;
		$runs = 0;
		$annuity = $pp/12/15;
		$diff = 1;
		
		while (abs($diff) > 0.01 && $runs <= 10)
		{
			$purchase_price_1 = MetebQuote::calc_pp($quote, $pri, $annuity);
			$purchase_price_2 = MetebQuote::calc_pp($quote, $pri, $annuity + $shock);
			$diff = $pp - $purchase_price_1;
			$annuity = $annuity + $diff / ( ($purchase_price_2-$purchase_price_1) / $shock );
			$runs++;
		}
		
		
		if ($runs <= 10)
			return $annuity;
		else
			return false;
	}
	
	
	/**
	 * Function to calculate the net annutity
	 * 
	 * @param date $main_dob Date of Birth of the Client
	 * @param annuity $annuity The annutiy captured for the quote
	 * 
	 * @return double Annutiy net value
	 */	
	public static function calc_net_annuity($main_dob, $annuity)
	{	
		/** 
		 * This function calculates the net (of tax) initial annuity amount from the gross initial annuity
		 * It gets the tax rates and rebates from the database (which must be updated every year)
		 */
		$tax_rates = Doctrine::getTable('Taxrate')->get_tax_rates();
		$tax_rebates = Doctrine::getTable('TaxRebate')->get_tax_rebates();
		$marketResult = Doctrine::getTable('Marketdata')->get_latest_marketdata();
		$month_array = $marketResult['month_array'];
		
		/**
		 * Calculate marginal tax rate and amount based on a per bracket sum
		 */
		$tax_rates[0][3] = 0;
		for ($pos = 1; $pos <= count($tax_rates)-1; $pos++){
			$tax_rates[$pos][3] = $tax_rates[$pos-1][3]+$tax_rates[$pos-1][1]*($tax_rates[$pos][2]-$tax_rates[$pos-1][2]);
		}
		
		$annual_annuity = $annuity * 12;
	
		/**
		 * Calculate tax age based on commencement date of quote
		 */
		$main_dob = (strtotime($main_dob) + 2209168800) / 86400;
		$age = floor(($month_array[1][1]-$main_dob) / 365.25);
		
		// $age = Meteb::getAge($main_dob);

		$tax_before_rebate = 0;
		
		for ($pos=0; $pos<=count($tax_rates)-2; $pos++){
			$tax_before_rebate = $tax_before_rebate+(($tax_rates[$pos][2]<$annual_annuity)*$tax_rates[$pos][1]*(min($tax_rates[$pos+1][2],$annual_annuity)-$tax_rates[$pos][2]));
		}
		
		$rebate=0;
		for ($pos=1; $pos <= count($tax_rebates)-1; $pos++){
			$rebate = $rebate+(($age>=$tax_rebates[$pos-1][1] && $age<$tax_rebates[$pos][1])*$tax_rebates[$pos][2]);
		}
		
		$tax_after_rebate = max($tax_before_rebate-$rebate,0);
		//exit;
		return ($annual_annuity-$tax_after_rebate)/12;
	}
	
	
	/**
	 * This function does a quote and calculates a purchase price from an annuity amount
	 * No allowance is made for commission and tax
	 * 
	 * @param quote $quote The quote that needs to be generated
	 * @param double $pri
	 * @param double $annuity 
	 * 
	 * @return double Purchase price
	 */
	public static function calc_pp($quote, $pri, $annuity)
	{	
		// The required data is read from the database
		$marketResult = Doctrine::getTable('Marketdata')->get_latest_marketdata();
		$exspenseResult = Doctrine::getTable('Expensedata')->get_expenses();
		$mortalityResult = Doctrine::getTable('MortalityRate')->get_mortality_rates();
		$max_age = 112;

		/** 
		 *  The calculations are performed. These are based on an excel spreadsheet called "quotes engine.xlsx". Contact the administrator for more info.
		 *  The calculations are done in the form of a table. This represents the spreadsheet from which the calculations are based.
		 *  The number of rows depends on how fast the probability of survival reduces to zero.
		 */ 

		if ($annuity <= 40000)
			$age_rating = -1;
		else
			$age_rating = -2;
			
		$main_sex = $quote->getMainSex();
		/*
		if ($this->getMainSex() == 1)
			$main_sex = 2;
		else
			$main_sex = 3;
		*/
			
		$spouse_sex = $quote->getSpouseSex();
		/*
		if ($this->getSpouseSex() == 1)
			$spouse_sex = 2;
		else
			$spouse_sex = 3;
		*/
			
		if ($annuity  <= 20000)
			$mortality_improvement = 0.005;
		elseif ($annuity  <= 40000)
			$mortality_improvement = 0.015;
		else
			$mortality_improvement = 0.01;
			
		$main_dob = (strtotime($quote->getMainDob()) + 2209168800)/86400;
		
		$spouse_dob = (strtotime($quote->getSpouseDob()) + 2209168800)/86400;
		
		if ($pri == 0.035)
			$column = 1;
		elseif ($pri == 0.040)
			$column = 2;
		elseif ($pri == 0.045)
			$column = 3;
			
		$calcs[0][1]=(strtotime($marketResult['inception_date']) + 2209168800)/86400-365.25/12;
		$calcs[0][2]=min(floor(($marketResult['month_array'][1][$column]-$main_dob)/365.25+$age_rating),$max_age);
		$calcs[0][8]=1;
		$calcs[0][9]=1;
		$calcs[0][14]=1;
		$calcs[0][17]=min(floor(($marketResult['month_array'][1][$column]-$spouse_dob)/365.25+$age_rating),$max_age);
		$calcs[0][21]=1;
		$calcs[0][22]=1;
		$calcs[0][29]=0;
		
		for ($row=1; $row<=1200; $row++)
		{
			$calcs[$row][1]=$calcs[$row-1][1]+365.25/12;
			$calcs[$row][2]=min(floor(($calcs[$row][1]-$main_dob)/365.25+$age_rating),$max_age);
			$calcs[$row][3]=$annuity;
			$calcs[$row][4]=$exspenseResult['renewal_expenses'] * 1.14;
			
			$index1 = $calcs[$row][2];
		
			$calcs[$row][5]=$mortalityResult[$index1][$main_sex];
			
			if ($calcs[$row][5] == 1)
				$calcs[$row][6] = 1;
			else
				$calcs[$row][6] = pow(1-$mortality_improvement,$row/12);
				
			$calcs[$row][7]=$calcs[$row][5]*$calcs[$row][6];
			
			if ($calcs[$row][2]==$calcs[$row-1][2])
				$calcs[$row][8]=$calcs[$row-1][8];
			else
				$calcs[$row][8]=$calcs[$row-1][8]*$calcs[$row-1][9];
				
			if ($calcs[$row][2]==$calcs[$row-1][2])
				$calcs[$row][9]=$calcs[$row-1][9]-$calcs[$row][7]/12;
			else
				$calcs[$row][9]=1-$calcs[$row][7]/12;
				
			if ($row <= $quote->gp)
				$calcs[$row][10]=1;
			else
				$calcs[$row][10]=$calcs[$row][8]*$calcs[$row][9];
				
			$calcs[$row][10]=max($calcs[$row][10],0);
			
			$calcs[$row][11]=$calcs[$row][3]*$calcs[$row][10];
			
			if ($row<=360)
				$calcs[$row][12]=$marketResult['dhfactors_matrix'][$row][$column]*$marketResult['discounting_array'][$row][$column];
			else
				$calcs[$row][12]=$marketResult['dhfactors_matrix'][360][$column]*$marketResult['discounting_array'][360][$column]*pow(1+$pri,(360-$row)/12);
				
			$calcs[$row][13]=$calcs[$row][4]*$calcs[$row][10];
			//deterministic expense inflation ignored for now
			$calcs[$row][15]=$calcs[$row][11]+$calcs[$row][13];

			$calcs[$row][16] = $calcs[$row][3] * $quote->getSpouseReversion()->getTitle() * $quote->second_life;
			$calcs[$row][17] = min(floor(($calcs[$row][1]-$spouse_dob)/365.25+$age_rating),$max_age);
			
			$index1 = $calcs[$row][17];
			
			$calcs[$row][18] = $mortalityResult[$index1][$spouse_sex];
			
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
		
		return ($calcs[1200][29]+$exspenseResult['initial_expenses']*1.14)/(1-$exspenseResult['loadings']*1.14);
	}	
	
	
	
	/**
	 * This function generates the quote calculations that will fill the
	 * new quote document
	 * 
	 * @param quote quote The quote that needs to be generated
	 * @param double $commission The Commission captured for the quote
	 * @param double $pp The Purchase Price for the quote 
	 * @param double $annuity The calculated Annuity
	 * 
	 * @return array Quote Data
	 */
	public static function generate($quote, $commission, $pp = 0, $annuity = 0.00)
	{
		$quote_out = array();
		
		$main_dob = '';
		$main_dob = $quote->getMainDob();
	    $spouse_dob = '';
	    $spouse_dob = $quote->getSpouseDob();
		
		$marketResult = Doctrine::getTable('Marketdata')->get_latest_marketdata();
		$exspenseResult = Doctrine::getTable('Expensedata')->get_expenses();
		
		/**
		 * This function calculates the outputs required to populate a GGWPA quote tender
		 * A quote is done for a 3.50%, 4.00% and 4.50% PRI
		 * A quote can either be calculated from an annuity amount to a purchase price or vice versa
		 * Annuity Amount -> Purchase Price : Set $pp=0 and specify a value for $annuity
		 * Purchase Price -> Annuity Amount : Set $annuity=0 and specify a value for $pp
		 */
		
		$commenceMonth = date('m', strtotime($quote->getCommenceAt()));
		$commenceYear = date('y', strtotime($quote->getCommenceAt()));
	
		//The following is just a list of all of the outputs that get generated
		$quote_out["data_date"] = "";
		$quote_out["quote_date"] = "";
		$quote_out["commencement_date"] = $quote->getCommenceAt();
		$quote_out["guanratee_terms"] = $quote->getGp();
		$quote_out["first_payment_date"] = "";
		$quote_out["first_increase_date"] = "";
		$quote_out["pp1"]="";
		$quote_out["pp2"]="";
		$quote_out["pp3"]="";
		$quote_out["gross_annuity_1"]="";
		$quote_out["gross_annuity_2"]="";
		$quote_out["gross_annuity_3"]="";
		$quote_out["tax1"]="";
		$quote_out["tax2"]="";
		$quote_out["tax3"]="";
		$quote_out["net_annuity_1"]="";
		$quote_out["net_annuity_2"]="";
		$quote_out["net_annuity_3"]="";
		$quote_out["commission_sacrificed"]="";
		$quote_out["main_age_next"]="";
		$quote_out["spouse_age_next"]="";
		$quote_out["premium_charge_1"]="";
		$quote_out["premium_charge_2"]="";
		$quote_out["premium_charge_3"]="";
		$quote_out["admin_charge_1"]="";
		$quote_out["admin_charge_2"]="";
		$quote_out["admin_charge_3"]="";
		$quote_out["expiry_date"]="";
		
		/**
		 * Uses Quote type to figure out what to calculate on
		 */
		if($quote->getQuoteTypeId() == 2)
		{
			$quote_out["pp1"]=$pp;
			$quote_out["pp2"]=$pp;
			$quote_out["pp3"]=$pp;

			$quote_out["gross_annuity_1"] = MetebQuote::calc_annuity($quote, 0.035, $pp);
			$quote_out["gross_annuity_2"] = MetebQuote::calc_annuity($quote, 0.040, $pp);
			$quote_out["gross_annuity_3"] = MetebQuote::calc_annuity($quote, 0.045, $pp);
		}
		else
		{
			$quote_out["gross_annuity_1"] = $annuity;
			$quote_out["gross_annuity_2"] = $annuity;
			$quote_out["gross_annuity_3"] = $annuity;

			$quote_out["pp1"] = MetebQuote::calc_pp($quote, 0.035, $annuity);
			$quote_out["pp2"] = MetebQuote::calc_pp($quote, 0.040, $annuity);
			$quote_out["pp3"] = MetebQuote::calc_pp($quote, 0.045, $annuity);
		}

		//Here the net annuity amount - which allows for tax to be deducted - is calculated for each PRI
		$quote_out["net_annuity_1"] = MetebQuote::calc_net_annuity($main_dob, $quote_out["gross_annuity_1"]);
		$quote_out["net_annuity_2"] = MetebQuote::calc_net_annuity($main_dob, $quote_out["gross_annuity_2"]);
		$quote_out["net_annuity_3"] = MetebQuote::calc_net_annuity($main_dob, $quote_out["gross_annuity_3"]);

		
		//Here we calculate the tax amount payable per month for each PRI
		$quote_out["tax1"] = $quote_out["gross_annuity_1"] - $quote_out["net_annuity_1"];
		$quote_out["tax2"] = $quote_out["gross_annuity_2"] - $quote_out["net_annuity_2"];
		$quote_out["tax3"] = $quote_out["gross_annuity_3"] - $quote_out["net_annuity_3"];

		
		//Maximum commission is 1.50% - a percentage of this can be sacrificed
		$quote_out["commission_sacrificed"] = $commission;
		
		//This calculates the next age that each of the main and spouse will obtain
		$quote_out["main_age_next"] = MetebQuote::calc_age($main_dob, $quote_out["commencement_date"])+1;
		
		if($spouse_dob != '0000-00-00') {
			$quote_out["spouse_age_next"] = MetebQuote::calc_age($spouse_dob, $quote_out["commencement_date"])+1;
		}else {
			$quote_out["spouse_age_next"] = '0000-00-00';
		}
		
		/**
		 * The first payment date is the last day of the inception month
		 * The first increase occurs one year after inception
		 */
		$commenceDate = new DateTime($quote_out["commencement_date"]);
		
		$firstPaymentDate = new DateTime(Meteb::last_business_day($commenceDate->format('m'), $commenceDate->format('Y')));
		
		$firstIncreaseDate = new DateTime($quote_out["commencement_date"]);
		$firstIncreaseDate->modify('+1 year');
		
		$dataDate = new DateTime($marketResult['uploaded_at']);
		
		$quote_out["commencement_date"] = $commenceDate->format('d M Y');
		$quote_out["first_payment_date"] = $firstPaymentDate->format('d M Y');
		$quote_out["first_increase_date"] = $firstIncreaseDate->format('d M Y');
		$quote_out["quote_date"] = date("d M Y", time());
		$quote_out["data_date"] = $dataDate->format('d M Y');

		/**
		 * This calculates the premium and admin charges that get deducted from the latest expense data
		 * The admin charge is simply the monthly renewal expense making allowance for tax
		 * The premium charge is the upfront amount that gets deducted from the pp amking allowance for tax
		 * The upfront amount includes the initial expense, the admin loading and internal commission
		 */
		
		$quote_out["premium_charge_1"]=($exspenseResult['initial_expenses']+$exspenseResult['loadings']*$quote_out["pp1"])*1.14;
		$quote_out["premium_charge_2"]=($exspenseResult['initial_expenses']+$exspenseResult['loadings']*$quote_out["pp2"])*1.14;
		$quote_out["premium_charge_3"]=($exspenseResult['initial_expenses']+$exspenseResult['loadings']*$quote_out["pp3"])*1.14;
		$quote_out["admin_charge_1"]=$exspenseResult['renewal_expenses']*1.14;
		$quote_out["admin_charge_2"]=$exspenseResult['renewal_expenses']*1.14;
		$quote_out["admin_charge_3"]=$exspenseResult['renewal_expenses']*1.14;

		//The expiry date is set to one week after the quote is generated
		$quote_out["expiry_date"]=date("Y-m-d",strtotime(date("Y-m-d",time())." +1 week"));
		
		return $quote_out;
	}
}
	