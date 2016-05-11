<?php
namespace N1coode\NjBlog\Controller;

/**
 * Abstract base controller
 * @author n1coode
 * @package nj_blog
 */
class AbstractController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
	/**
	 * @var int
	 */
	protected $storagePid;
	
	
	/**
	 * @var string
	 */
	protected $nj_ext_key = \N1coode\NjBlog\Utility\Constants::NJ_EXT_KEY;
	
	/**
	 * @var string
	 */
	protected $nj_ext_listtype = \N1coode\NjBlog\Utility\Constants::NJ_EXT_LISTTYPE;
	
	/**
	 * @var string
	 */
	protected $nj_ext_path = \N1coode\NjBlog\Utility\Constants::NJ_EXT_PATH;
	
	/**
	 * @var string
	 */
	protected $nj_ext_namespace = \N1coode\NjBlog\Utility\Constants::NJ_EXT_NAMESPACE;
	
	
	/**
	 * @var string
	 */
	protected $nj_action = '';
	
	/**
	 * @var string
	 */
	protected $nj_domain_model = '';
	
	/**
	 * @var string
	 */
	protected  $nj_domain = '';
	
	
	/**
	 * @var boolean
	 */
	protected $useTyposcript = false;
	
	/**
	 * @var array
	 */
	protected $nj_settings = array();
	
	
	//
	// Repositories
	//
	
	/**
	 * @var \TYPO3\CMS\Core\Resource\FileRepository
	 * @inject
	 */
	protected $fileRepository;
	
	
	/**
	 * @var \N1coode\NjBlog\Domain\Repository\BlogRepository
	 * @inject
	 */
	protected $blogRepository = NULL;
	
	/**
	 * @var \N1coode\NjBlog\Domain\Repository\CommentRepository
	 * @inject
	 */
	protected $commentRepository = NULL;
	
	
	/**
	 * @var \N1coode\NjBlog\Domain\Repository\LinkRepository
	 * @inject
	 */
	protected $linkRepository = NULL;
	
	/**
	 * @var \N1coode\NjBlog\Domain\Repository\PostRepository
	 * @inject
	 */
	protected $postRepository = NULL;
        
	/**
	 * @var \N1coode\NjBlog\Domain\Repository\TagRepository
	 * @inject
	 */
	protected $tagRepository = NULL;
	
	
	/**
	 * @var \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface
	 * @inject
	 */
	protected $configurationManager;
	
	/**
	 * Holds an instance of persistence manager
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager
	 * @inject
	 */
	protected $persistenceManager;
	
	protected $error = [];
	
	
	protected function init($model)
	{
		if($model !== null)
		{
			$this->nj_domain_model = $model;
			$this->nj_domain = strtolower($this->nj_domain_model);
			$this->nj_action = $this->request->getControllerActionName();
			
			
			$this->configurationManager = $this->objectManager->get('TYPO3\\CMS\\Extbase\\Configuration\\ConfigurationManagerInterface');
			
			if(\N1coode\NjCollection\Utility\Configuration::flexformSettingsExists($this->configurationManager))
			{
				\N1coode\NjCollection\Utility\Configuration::settings($this->configurationManager);
			}
			
			$configuration = $this->configurationManager->getConfiguration(\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_FRAMEWORK);
			
			$this->settings = $configuration['settings'];
			
			unset($this->settings['flexform']);
		}
		else
		{
			throw new \TYPO3\CMS\Extbase\Configuration\Exception\InvalidConfigurationTypeException
				('Kein Model angegeben. Überprüfe die Controller-Klasse.',48246892768209576);
		}
		
		if(!isset($this->settings))
			throw new \TYPO3\CMS\Extbase\Configuration\Exception('Please include typoscript to enable the extension.', 48246892768209576 );
		
		if(isset($configuration['persistence']['storagePid']))
			$this->storagePid = intval($configuration['persistence']['storagePid']);		
		
		$this::includeJavaScript();
	}
	
	
	protected function callActionMethod() 
	{
		Try {
			parent::callActionMethod();
		} Catch(Exception $e) {
			$this->response->appendContent($e->getMessage());
		}
	}
	

	/**
	 * @param \String $controller
	 * @param \String $action
	 * @param \String $format
	 * @return \TYPO3\CMS\Fluid\View\StandaloneView
	 */
	protected function initViewAjax($controller, $action, $format)
	{
		$view = $this->objectManager->create('TYPO3\CMS\Fluid\View\StandaloneView');
		$view->setFormat($format);
		$view->setTemplatePathAndFilename(\TYPO3\CMS\Core\Utility\GeneralUtility::getFileAbsFileName('EXT:nj_portfolio/Resources/Private/Templates/'.$controller.'/'.ucfirst($action).'.'.$format));
		$view->setPartialRootPath(\TYPO3\CMS\Core\Utility\GeneralUtility::getFileAbsFileName('EXT:nj_portfolio/Resources/Private/Partials/'));
		$view->setLayoutRootPath(\TYPO3\CMS\Core\Utility\GeneralUtility::getFileAbsFileName('EXT:nj_portfolio/Resources/Private/Layouts/'));
		
		return $view;
	}
	
	private function includeJavaScript() 
	{
		if($this->nj_domain === 'work')
		{
			//$GLOBALS['TSFE']->getPageRenderer()
			//	->addJsFile(\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($this->nj_ext_path) . 'Resources/Public/Javascript/Lib/jquery.elevateZoom-3.0.8.min.js');
		
			if($this->nj_action === 'digest')
			{
				$GLOBALS['TSFE']->getPageRenderer()
					->addJsFile(\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('nj_collection') . 'Resources/Public/Javascript/Lib/jquery/plugins/jquery.imagesloaded.pkgd.min.js');
				$GLOBALS['TSFE']->getPageRenderer()
					->addJsFile(\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('nj_collection') . 'Resources/Public/Javascript/Lib/jquery/plugins/jquery.masonry.pkgd.min.js');
				
				//$GLOBALS['TSFE']->getPageRenderer()
				//	->addJsFile(\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('nj_collection') . 'Resources/Public/Javascript/Lib/jquery/plugins/jquery.shuffle-3.1.1.min.js');
				
				//http://salvattore.com/
				//$GLOBALS['TSFE']->getPageRenderer()
				//	->addJsFooterFile(\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('nj_collection') . 'Resources/Public/Javascript/Lib//salvattore.min.js');
			}
		}
		
		if($this->settings['general']['includeJQuery'])
		{
			$GLOBALS['TSFE']->getPageRenderer()
				->addJsLibrary(
					'jQuery_NjPortfolio',
					\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($this->nj_ext_path) . 'Resources/Public/Javascript/Lib/jquery-1.11.3.min.js');
		}
            
		     
		$GLOBALS['TSFE']->getPageRenderer()
			->addJsFile(\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($this->nj_ext_path) . 'Resources/Public/Javascript/'.$this->nj_ext_key.'_frontend.js');
		
	}
	
	
	protected function setExtSettings()
	{
		$extSettings = [];
		$extSettings['action']						= explode('Action',self::getCaller())[0];
		$extSettings['typeNum']						= $this->settings['general']['ajax']['typeNum'];
		//$extSettings['ajax']['path']['partial']		= $this->settings['view']['partialRootPath'];
		//$extSettings['ajax']['path']['template']	= $this->settings['view']['templateRootPath'];
		$extSettings['controller']					= $this->nj_domain_model;		
		$extSettings['domain']						= $this->nj_domain;
		$extSettings['key']							= $this->nj_ext_key;
		$extSettings['langFile']					= 'LLL:EXT:'.$this->nj_ext_path.'/Resources/Private/Language/locallang.xlf:';
		$extSettings['language']					= $GLOBALS['TSFE']->sys_language_uid;
		$extSettings['name']						= strtolower($this->nj_ext_namespace);
		$extSettings['pageId']						= $GLOBALS['TSFE']->page['uid'];

		
		return $extSettings;
	}
	
	
	protected function getCaller() 
	{
		$trace = debug_backtrace();
		$name = $trace[2]['function'];
		return empty($name) ? 'global' : $name;
	}
	
	
	private function includeCss()
	{
		$cssFile = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($this->nj_ext_path) . 'Resources/Public/Css/'.$this->nj_ext_key.'.css';
					
		//if(!empty($this->settings['model'][strtolower($model)]['cssFile']))
		//{
		//	$cssFile = $this->settings['model'][strtolower($model)]['cssFile'];
		//}
		//$GLOBALS['TSFE']->getPageRenderer()->addCssFile($cssFile);
	}
	
	
	protected function storagePidIsset()
	{
		if(isset($this->settings['persistence']['storagePid']))
		{
			return true;
		}
		else {
			return false;
		}
	}
	
	
	/**
	 * var_dump
	 */
		//\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($frameworkConfiguration, 'Configuration -> $frameworkConfiguration');
	
} //end of class Tx_NjPortfolio_Controller_AbstractController