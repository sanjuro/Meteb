<?php

/**
 * Commission
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    meteb
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Commission extends BaseCommission
{
	/**
	 * Method to render a string representation of a Commission
	 * 
	 * @param void
	 * @return string representation of commission
	 */
	public function toString(){
		return $this->getValue();
	}
}