<?php
namespace N1coode\NjBlog\Domain\Model;

/**
 * A blog
 */
class Blog extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
	/**
	 * The blog's title.
	 *
	 * @var string
	 * @validate StringLength(minimum = 1, maximum = 80)
	 */
	protected $title = '';
	
	/**
	 * A short description of the blog.
	 *
	 * @var string
	 * @validate StringLength(maximum = 150)
	 */
	protected $description = '';
	
	/**
	 * Number of (post) entries listed on a page.
	 * 
	 * @var int
	 * @validate Integer
	 */
	protected $entriesLimit = '';
	
	/** 
	 * Option, whether Ajax should be used.
	 * 
	 * @var boolean 
	 */
	protected $useAjax = FALSE;
	
	/**
	 * Option, whether post should be use a readmore-link instead of full text.
	 * 
	 * @var boolean
	 */
	protected $useReadmore = FALSE;
	
	/**
	 * Option, whether the blog uses a double layout or not.
	 *
	 * @var boolean
	 */
	protected $activateDoubleLayout = FALSE;
	
	
	/**
	 * The posts of this blog
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\N1coode\NjBlog\Domain\Model\Post>
	 * @lazy
	 * @cascade remove
	 */
	protected $posts;
	
	
	/**
	 * Constructs a new Blog
	 *
	 */
	public function __construct() {
		
	}
	
	/**
	 * Sets this blog's title.
	 *
	 * @param string $title The blog's title
	 * @return void
	 */
	public function setTitle($title) {
		$this->title = $title;
	}
	
	/**
	 * Returns the blog's title.
	 *
	 * @return string The blog's title
	 */
	public function getTitle() {
		return $this->title;
	}
	
	/**
	 * Sets the description for the blog.
	 *
	 * @param string $description
	 * @return void
	 */
	public function setDescription($description) {
		$this->description = $description;
	}
	
	/**
	 * Returns the description.
	 *
	 * @return string
	 */
	public function getDescription() {
		return $this->description;
	}
	
	/**
	 * Sets the number of posts per page.
	 * 
	 * @param int $limitEntries
	 * @return void
	 */
	public function setEntriesLimit($entriesLimit)
	{
		$this->entriesLimit = $entriesLimit;
	}
	
	/**
	 * Returns the number of posts per page.
	 * 
	 * @return integer
	 */
	public function getEntriesLimit()
	{
		return $this->entriesLimit;
	}
	
	/**
	 * Sets the use of Ajax to true/false.
	 *
	 * @param boolen $useAjax
	 * @return void
	 */
	public function setUseAjax($useAjax)
	{
		$this->useAjax = $useAjax;
	}	
	
	/**
	 * Returns the setup for the use of ajax for pagination.
	 * 
	 * @return boolean
	 */
	public function getUseAjax() 
	{
		return $this->useAjax;
	}
	
	/**
	 * Sets the use of a readmore-link to true/false.
	 *
	 * @param boolen $useReadmore
	 * @return void
	 */
	public function setUseReadmore($useReadmore)
	{
		$this->useReadmore = $useReadmore;
	}
	
	/**
	 * Returns the setup for the use of a readmore-link.
	 *
	 * @return boolean
	 */
	public function getUseReadmore()
	{
		return $this->useReadmore;
	}
	
	/**
	 * Sets the activation of the double layout.
	 *
	 * @param boolen $activateDoubleLayout
	 * @return void
	 */
	public function setActivateDoubleLayout($activateDoubleLayout)
	{
		$this->activateDoubleLayout = $activateDoubleLayout;
	}
	
	/**
	 * Returns the setup for the activation of the double layout.
	 *
	 * @return boolean
	 */
	public function getActivateDoubleLayout()
	{
		return $this->activateDoubleLayout;
	}
	
	/**
	 * Adds a post to this blog
	 *
	 * @param \N1coode\NjBlog\Domain\Model\Post $post
	 * @return void
	 */
	public function addPost(\N1coode\NjBlog\Domain\Model\Post $post) {
		$this->posts->attach($post);
	}
	
	/**
	 * Remove a post from this blog
	 *
	 * @param \N1coode\NjBlog\Domain\Model\Post $post ToRemove The post to be removed
	 * @return void
	 */
	public function removePost(\N1coode\NjBlog\Domain\Model\Post $postToRemove) {
		$this->posts->detach($postToRemove);
	}
	
	/**
	 * Remove all posts from this blog
	 *
	 * @return void
	 */
	public function removeAllPosts() {
		$this->posts = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}
	
	
	/**
	 * Returns all posts in this blog
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
	 */
	public function getPosts() {
		
		var_dump($this->posts);
		
		return $this->posts;
	}
	
} //end of class \N1coode\NjBlog\Domain\Model\Blog
?>