<?php
/**
 * sfValidatorPostQuote.class.php
 *
 * @package default
 */


class sfValidatorPostQuote extends sfValidatorBase {

	/**
	 *
	 *
	 * @param unknown $options  (optional)
	 * @param unknown $messages (optional)
	 */
	protected function configure($options = array(), $messages = array()) {
		$this->addMessage('spousedetails1', 'Please enter the Spouse\'s Gender');
		$this->addMessage('spousedetails2', 'Please enter the Spouse\'s Date of Birth');
		$this->addMessage('spousedetails3', 'Please choose a valid Spouse\'s Reversion');
	}


	/**
	 *
	 *
	 * @param unknown $values
	 * @return unknown
	 */
	protected function doClean($values) {
		$errorSchema = new sfValidatorErrorSchema($this);

		foreach ($values as $key => $value) {
			$errorSchemaLocal = new sfValidatorErrorSchema($this);

			if ( $key == 'second_life' && $values['second_life'] == 1 && $values['spouse_sex'] == '') {
				$errorSchemaLocal->addError(new sfValidatorError($this, 'spousedetails1') );
			}

			if ( $key == 'second_life' && $values['second_life'] == 1 && $values['spouse_dob'] == '') {
				$errorSchemaLocal->addError(new sfValidatorError($this, 'spousedetails2') );
			}
			//METeb::TKO($values);
			if ( $key == 'second_life' && $values['second_life'] == 1 && $values['spouse_reversion_id'] == '') {
				$errorSchemaLocal->addError(new sfValidatorError($this, 'spousedetails3') );
			}

			// some error for this embedded-form
			if (count($errorSchemaLocal)) {
				$errorSchema->addError($errorSchemaLocal, (string) $key);
			}

		}
		// throws the error for the main form
		if (count($errorSchema)) {
			throw new sfValidatorErrorSchema($this, $errorSchema);
		}

		return $values;
	}


}


?>
