<?php
namespace N1coode\NjBlog\Domain\Model;

/**
 * A tag
 */
class Tag extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
	/**
	 * The tag's title.
	 *
	 * @var string
	 * @validate StringLength(minimum = 1, maximum = 100)
	 */
	protected $title = '';
	
	public function __construct($title) {
		$this->title = $title;
	}
	
	/**
	 * Sets the tag's title
	 *
	 * @param string $title The tag's title
	 * @return void
	 */
	public function setTitle($title)
	{
		$this->title = $title;
	}
	
	/**
	 * Returns the tag's title
	 *
	 * @return string The tag's title
	 */
	public function getTitle()
	{
		return $this->title;
	}
	
} //end of class \N1coode\NjBlog\Domain\Model\Tag
?>