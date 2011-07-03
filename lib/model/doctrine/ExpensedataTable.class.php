<?php

/**
 * ExpensedataTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class ExpensedataTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object ExpensedataTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Expensedata');
    }
    
	/** 
	 *	This function retreives the expense data from the database
	 *	There should only be one line of data, so only the one row is read
	 *
	 * @param unknown_type $upload_date
	 * @param unknown_type $inception_date
	 * @param unknown_type $month_array
	 * @param unknown_type $discounting_array
	 * @param unknown_type $dhfactors_matrix
	 * 
	 * @return array Array of Exspenses Data
	 */	
	public function get_expenses()
	{
		$expenseData = array();
		$exspenseResult = array();
		
		$q = Doctrine_Query::create()
		   ->from('Expensedata e')
		   ->where('e.id = ?', 1)
		   ->limit(1);		
		     
		$expenseData = $q->fetchOne(); 		

		$exspenseResult['id']= $expenseData['id'];
		$exspenseResult['renewal_expenses'] = $expenseData['renewal_expenses'];
		$exspenseResult['expense_inflation'] = $expenseData['expense_inflation'];
		$exspenseResult['initial_expenses'] = $expenseData['initial_expenses'];
		$exspenseResult['loadings'] = $expenseData['loadings'];
		
	
		return $exspenseResult;
	}
}