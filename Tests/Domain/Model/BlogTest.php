<?php

class Tx_NjBlog_Domain_Model_BlogTest extends Tx_Extbase_Tests_Functional_BaseTestCase
{
	/**
	 * @test
	 */
	public function anInstanceOfTheBlogCanBeConstructed()
	{
		$blog = new Tx_NjBlog_Domain_Model_Blog('Title');
		$this->assertEquals('Title',$blog->getTitle());
	}
}

?>