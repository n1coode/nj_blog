<?php
namespace N1coode\NjBlog\Domain\Repository;
/**
 * @author n1coode
 * @package nj_blog
 */
class AbstractRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
	protected $defaultOrderings = array(
			'crdate' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING,
			'uid' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING
	);
	
	/**
	 * Initializes the repository.
	 * @return void
	 * @see \TYPO3\CMS\Extbase\Persistence\Repository::initializeObject()
	*/
	public function initializeObject()
	{
		$querySettings = $this->objectManager->get('TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Typo3QuerySettings');
		$querySettings->setRespectStoragePage(FALSE);
		$querySettings->setRespectSysLanguage(FALSE);
	
		$this->setDefaultQuerySettings($querySettings);
	}
  
} //end of class \N1coode\NjBlog\Domain\Repository\AbstractRepository 
?>