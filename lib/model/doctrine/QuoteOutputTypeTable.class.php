<?php

/**
 * QuoteOutputTypeTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class QuoteOutputTypeTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object QuoteOutputTypeTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('QuoteOutputType');
    }
    
    /**
     * Returns all quote output types
     *
     * @return array Quote Outputs in an array form
     */
    public static function getQuoteOutputTypes()
    {
		$result = array();
    	
    	$query = Doctrine_Query::create()
		    	->from('QuoteOutputType qot');
		    	
		$quoteOptionTypes = $query->fetchArray();
		
		foreach($quoteOptionTypes as $value){
			$output[$value['title']] = $value['id'];
		}
		
		return $output;
    }       
}