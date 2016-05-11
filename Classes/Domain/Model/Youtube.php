<?php
namespace N1coode\NjBlog\Domain\Model;

/**
 * A Youtube-Video
 */
class Youtube extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
	/**
	 * var string
	 */
	protected $videoId;
	
	/**
	 * @var int
	 */
	protected $videoWidth;
	
	/**
	 * @var int
	 * 
	 * 0 = 16:9
	 * 1 = 4:3
	 */
	protected $videoRatio;
	
	/**
	 * @var int
	 */
	protected $showProposals;
	
	/**
	 * @var int
	 */
	protected $allowFullscreen;
	
	/**
	 * @var string
	 */
	protected $userDefinedValues;
	
	
	/* ***************************************************** */
	
	/**
	 * Constructs a new youtube video
	 *
	 */
	public function __construct() {
	
	}
	
	/* ***************************************************** */
	
	
	/**
	 * Sets the youtube video id
	 *
	 * @param string $videoId
	 * @return void
	 */
	public function setVideoId($videoId)
	{
		$this->videoId = $videoId;
	}
	
	/**
	 * Returns the youtube video id
	 * 
	 * @return string
	 */
	public function getVideoId()
	{
		return $this->videoId;
	}
	
	
	/**
	 * Sets the width of the video
	 *
	 * @param int $videoWidth
	 * @return void
	 */
	public function setVideoWidth($videoWidth)
	{
		$this->videoWidth = $videoWidth;
	}
	
	/**
	 * Returns the width of the video
	 *
	 * @return int
	 */
	public function getVideoWidth()
	{
		return $this->videoWidth;
	}
	
	
	/**
	 * Sets the ratio of the video
	 *
	 * @param int $videoRatio
	 * @return void
	 */
	public function setVideoRatio($videoRatio)
	{
		$this->videoRatio = $videoRatio;
	}
	
	/**
	 * Returns the ratio of the video
	 *
	 * @return int
	 */
	public function getVideoRatio()
	{
		return $this->videoRatio;
	}
	
	
	/**
	 * Sets option for showing proposals at the end of the video
	 *
	 * @param int $showProposals
	 * @return void
	 */
	public function setShowProposals($showProposals)
	{
		$this->showProposals = $showProposals;
	}
	
	/**
	 * Returns option for showing proposals at the end of the video
	 *
	 * @return int
	 */
	public function getShowProposals()
	{
		return $this->showProposals;
	}
	
	
	/**
	 * Sets option for allowing full-screen mode
	 *
	 * @param int $allowFullscreen
	 * @return void
	 */
	public function setAllowFullscreen($allowFullscreen)
	{
		$this->allowFullscreen = $allowFullscreen;
	}
	
	/**
	 * Returns option for allowing full-screen mode
	 *
	 * @return int
	 */
	public function getAllowFullscreen()
	{
		return $this->allowFullscreen;
	}
	
	
	/**
	 * Sets user defined values for the video link
	 *
	 * @param string $userDefinedValues
	 * @return void
	 */
	public function setUserDefinedValues($userDefinedValues)
	{
		$this->userDefinedValues = $userDefinedValues;
	}
	
	/**
	 * Returns user defined values for the video link
	 *
	 * @return string
	 */
	public function getUserDefinedValues()
	{
		return $this->userDefinedValues;
	}
	
	
} //end of class \N1coode\NjBlog\Domain\Model\Youtube
?>