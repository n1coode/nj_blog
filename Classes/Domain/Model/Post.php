<?php
namespace N1coode\NjBlog\Domain\Model;

/**
 * A post
 */
class Post extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
	/**
	 * The post's creation date.
	 * 
	 * @var DateTime
	 */
	protected $crdate;
	
	/**
	 * The post's title.
	 *
	 * @var string
	 * @validate StringLength(minimum = 1, maximum = 100)
	 */
	protected $title;
	
	/**
	 * The introduction elements of this post
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\N1coode\NjBlog\Domain\Model\PostElement>
	 * @lazy
	 * @cascade remove
	 */
	protected $intro;
	
	/**
	 * The content elements of this post
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\N1coode\NjBlog\Domain\Model\PostElement>
	 * @lazy
	 * @cascade remove
	 */
	protected $content;
	
	/**
	 * The sources of this post
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\N1coode\NjBlog\Domain\Model\Link>
	 * @lazy
	 * @cascade remove
	 */
	protected $sources;
	
	/**
	 * The tags of this post
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\N1coode\NjBlog\Domain\Model\Tag>
	 * @lazy
	 * @cascade remove
	 */
	protected $tags;
	
	/**
	 * Relative Posts of this post
	 * 
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\N1coode\NjBlog\Domain\Model\Post>
	 * @lazy
	 * @cascade remove
	 */
	protected $relPosts;
	
	
	
	public function __construct() {
		
	}
	
	/**
	 * Sets the post's creation date
	 * 
	 * @param DateTime $crdate The post's creation date
	 * @return void
	 */
	public function setCrdate($crdate)
	{
		$this->crdate = $crdate;
	}
	
	/**
	 * Returns the post's creation date
	 * 
	 * @return DateTime The post's creation date.
	 */
	public function getCrdate()
	{
		return $this->crdate;
	}
	
	/**
	 * Sets the post's title
	 *
	 * @param string $title The post's title
	 * @return void
	 */
	public function setTitle($title) 
	{
		$this->title = $title;
	}
	
	/**
	 * Returns the post's title
	 *
	 * @return string The post's title
	 */
	public function getTitle() 
	{
		return $this->title;
	}
	
	/**
	 * Sets the post's intro
	 * 
	 * @param string $intro The post's intro
	 * @return void
	 */
	 public function setIntro($intro)
	 {
	 	$this->intro = $intro;
	 }
	 
	 
	 /**
	  * Returns all intro elements of this post
	  *
	  * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
	  */
	 public function getIntro()
	 {
	 	return $this->intro;
	 }
	 
	 
	 /**
	  * Returns all content elements of this post
	  *
	  * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
	  */
	 public function getContent()
	 {
	 	return $this->content;
	 }
	
	
	/**
	 * Returns all sources of this post
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
	 */
	public function getSources()
	{
		return $this->sources;
	}
	
	
	/**
	 * Returns all tags of this post
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
	 */
	public function getTags() 
	{
		return $this->tags;
	}
	
	
	/**
	 * Returns all relative posts of this post
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
	 */
	public function getRelPosts()
	{
		return $this->relPosts;
	}
	 
} //end of class \N1coode\NjBlog\Domain\Model\Post