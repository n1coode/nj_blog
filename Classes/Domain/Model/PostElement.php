<?php
namespace N1coode\NjBlog\Domain\Model;

/**
 * A post (content) element
 */
class PostElement extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
	/**
	 * @var int
	 */
	protected $uid;
	
	/**
	 * @var string
	 */
	protected $etype;
	
	/**
	 * @var string
	 */
	protected $content;
	
	/**
	 * @var string
	 */
	protected $img;
	
	/**
	 * @var string
	 */
	protected $imgAdjustment;
	
	/**
	 * @var int
	 */
	protected $imgWidth;
	
	/**
	 * @var int
	 */
	protected $imgHeight;
	
	/**
	 * @var int
	 */
	protected $imgUseThumb;
	
	/**
	 * @var int
	 */
	protected $imgWidthThumb;
	
	/**
	 * @var int
	 */
	protected $imgHeightThumb;
	
	/**
	 * @var string
	 */
	protected $imgCopyright;	
	
	/*************************
	 * Element: youtube
	 */
	
	/**
	 * @var string
	 */
	protected $ytVideoId;
	
	/**
	 * @var int
	 */
	protected $ytVideoWidth;
	
	/**
	 * @var int
	 *
	 * 0 = 16:9
	 * 1 = 4:3
	 */
	protected $ytVideoRatio;
	
	/**
	 * @var int
	 */
	protected $ytShowProposals;
	
	/**
	 * @var int
	 */
	protected $ytAllowFullscreen;
	
	/**
	 * @var string
	 */
	protected $ytUserDefined;
	
	
	/* ***************************************************** */
	
	/**
	 * Constructs a new post element
	 *
	 */
	public function __construct() {
	
	}
	
	/* ***************************************************** */
	
	
	/**
	 * Returns the type of the post element
	 *
	 * @return string
	 */
	public function getEtype()
	{
		return $this->etype;
	}
	
	/**
	 * Sets the type of the post element
	 *
	 * @param string $etype
	 * @return void
	 */
	public function setEtype($etype)
	{
		$this->etype = $etype;
	}
	
	
	/**
	 * Sets the content of the post element
	 *
	 * @param string $content
	 * @return void
	 */
	public function setContent($content)
	{
		$this->content = $content;
	}
	
	/**
	 * Returns the content of the post element
	 *
	 * @return string $content
	 */
	public function getContent()
	{
		return $this->content;
	}
	
	
	/**
	 * Returns the image of the post element
	 *
	 * @return string
	 */
	public function getImg()
	{
		return $this->img;
	}
	
	/**
	 * Sets the image of the post element
	 *
	 * @param string $img
	 * @return void
	 */
	public function setImg($img)
	{
		$this->img = $img;
	}
	
	
	/**
	 * Returns the adjustment of the image
	 *
	 * @return string
	 */
	public function getImgAdjustment()
	{
		return $this->imgAdjustment;
	}
	
	/**
	 * Sets the adjustment of the image
	 *
	 * @param string $imgAdjustment
	 * @return void
	 */
	public function setImgAdjustment($imgAdjustment)
	{
		$this->imgAdjustment = $imgAdjustment;
	}
	
	
	/**
	 * Returns the width of the image
	 *
	 * @return int
	 */
	public function getImgWidth()
	{
		return $this->imgWidth;
	}
	
	/**
	 * Sets the width of the image
	 *
	 * @param int $imgWidth
	 * @return void
	 */
	public function setImgWidth($imgWidth)
	{
		$this->imgWidth = $imgWidth;
	}
	
	
	/**
	 * Returns the height of the image
	 *
	 * @return int
	 */
	public function getImgHeight()
	{
		return $this->imgHeight;
	}
	
	/**
	 * Sets the height of the image
	 *
	 * @param int $imgHeight
	 * @return void
	 */
	public function setImgHeight($imgHeight)
	{
		$this->imgHeight = $imgHeight;
	}
	
	
	/**
	 * Returns the option if thumb is used
	 *
	 * @return int
	 */
	public function getImgUseThumb()
	{
		return $this->imgUseThumb;
	}
	
	/**
	 * Sets the the option if thumb is used
	 *
	 * @param int $imgUseThumb
	 * @return void
	 */
	public function setImgUseThumb($imgUseThumb)
	{
		$this->imgUseThumb = $imgUseThumb;
	}
	
	
	/**
	 * Returns the width of the image thumb
	 *
	 * @return int
	 */
	public function getImgWidthThumb()
	{
		return $this->imgWidthThumb;
	}
	
	/**
	 * Sets the width of the image thumb
	 *
	 * @param int $imgWidthThumb
	 * @return void
	 */
	public function setImgWidthThumb($imgWidthThumb)
	{
		$this->imgWidthThumb = $imgWidthThumb;
	}
	
	
	/**
	 * Returns the height of the image thumb
	 *
	 * @return int
	 */
	public function getImgHeightThumb()
	{
		return $this->imgHeightThumb;
	}
	
	/**
	 * Sets the height of the image thumb
	 *
	 * @param int $imgHeightThumb
	 * @return void
	 */
	public function setImgHeightThumb($imgHeightThumb)
	{
		$this->imgHeightThumb = $imgHeightThumb;
	}
	
	
	/**
	 * Sets the copyright owner of the image
	 *
	 * @param string $imgCopyright
	 * @return void
	 */
	public function setImgCopyright($imgCopyright)
	{
		$this->imgCopyright = $imgCopyright;
	}
	
	/**
	 * Returns the copyright owner of the image
	 *
	 * @return string $imgCopyright
	 */
	public function getImgCopyright()
	{
		return $this->imgCopyright;
	}
	
} //end of class \N1coode\NjBlog\Domain\Model\PostElement
?>