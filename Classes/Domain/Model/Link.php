<?php
namespace N1coode\NjBlog\Domain\Model;

/**
 * A link
 */
class Link extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
	/**
	 * The link's title.
	 *
	 * @var string
	 * @validate StringLength(minimum = 1, maximum = 80)
	 */
	protected $title = '';
	
	/**
	 * A short description of the link.
	 *
	 * @var string
	 * @validate StringLength(maximum = 150)
	 */
	protected $description = '';
	
	/**
	 * @var string
	 */
	protected $url;
	
	
	/**
	 * Constructs a new Link
	 *
	 */
	public function __construct() {
	
	}
	
	
	/**
	 * Sets this link's title.
	 *
	 * @param string $title
	 * @return void
	 */
	public function setTitle($title) 
	{
		$this->title = $title;
	}
	
	/**
	 * Returns the link's title.
	 * 
	 * @return string
	 */
	public function getTitle() 
	{
		return $this->title;
	}
	
	/**
	 * Sets a description for the link.
	 *
	 * @param string $description
	 * @return void
	 */
	public function setDescription($description) 
	{
		$this->description = $description;
	}
	
	/**
	 * Returns the description.
	 *
	 * @return string
	 */
	public function getDescription() 
	{
		return $this->description;
	}
	
	/**
	 * Get url
	 *
	 * @return string
	 */
	public function getUrl() 
	{
		return $this->url;
	}
	
	/**
	 * Set url
	 *
	 * @param string $url
	 * @return void
	 */
	public function setUri($url) 
	{
		$this->url = $url;
	}
	
} //end of class \N1coode\NjBlog\Domain\Model\Link
?>