<?php

/**
 * An exemplary Blog validator
 */
class Tx_NjBlog_Domain_Validator_BlogValidator extends Tx_Extbase_Validation_Validator_AbstractValidator 
{
	/**
	 * Checks whether the given blog is valid
	 *
	 * @param Tx_NjBlog_Domain_Model_Blog $blog The blog
	 * @return boolean TRUE if blog could be validated, otherwise FALSE
	 */
	public function isValid($blog) 
	{
		if (strtolower($blog->getTitle()) === 'extbase') 
		{
			$this->addError(Tx_Extbase_Utility_Localization::translate('error.Blog.invalidTitle', 'NjBlog'), 1297418974);
			return FALSE;
		}
		return TRUE;
	}
	
}

?>