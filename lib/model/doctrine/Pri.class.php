<?php

/**
 * Pri
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    meteb
 * @subpackage model
 * @author     Shadley Wentzel
 * @version    GIT
 */
class Pri extends BasePri
{
	/**
	 * Method to render a string representation of a PRI
	 * 
	 * @param void
	 * @return string representation of PRI
	 */
	public function toString(){
		return $this->getValue();
	}
}