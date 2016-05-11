<?php
if (!defined ('TYPO3_MODE')) die ('Access denied.');

$nj_extkey = 'tx_njblog';
$nj_extkey_lang = 'nj_blog';

$type_general =	'--div--;LLL:EXT:nj_blog/Resources/Private/Language/locallang_db.xml:general.tabs.generalSettings,--palette--;LLL:EXT:nj_blog/Resources/Private/Language/locallang_db.xml:tx_njblog_domain_model_post_element.etype;etype,--palette--;LLL:EXT:nj_blog/Resources/Private/Language/locallang_db.xml:general.headline;headline';
$type_content =	'--div--;LLL:EXT:nj_blog/Resources/Private/Language/locallang_db.xml:general.tabs.content, content';
$type_image =	'--div--;LLL:EXT:nj_blog/Resources/Private/Language/locallang_db.xml:general.tabs.image, img, img_adjustment, img_width, img_height, img_use_thumb, img_copyright';
$type_youtube =	'--div--;LLL:EXT:nj_blog/Resources/Private/Language/locallang_db.xml:general.tabs.youtube, yt_video_id, yt_video_width, yt_ratio, yt_show_proposals, yt_allow_fullscreen, yt_additional';
$type_code = 	'--div--;LLL:EXT:nj_blog/Resources/Private/Language/locallang_db.xml:general.tabs.code, content';

$TCA['tx_njblog_domain_model_postelement']['ctrl']['type'] = 'etype';

$TCA['tx_njblog_domain_model_postelement'] = array(
	'ctrl' => $TCA['tx_njblog_domain_model_postelement']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'etype, content'
	),
	'columns' => array(
		'etype' => Array (
			'label'   => 'LLL:EXT:nj_blog/Resources/Private/Language/locallang_db.xml:tx_njblog_domain_model_postelement.etype',
			'onChange' => 'reload',
			'config' => Array (
				'type' => 'select',
				'items' => array(
					array('LLL:EXT:nj_blog/Resources/Private/Language/locallang_db.xml:tx_njblog_domain_model_postelement.etype.text', 'text'),
					array('LLL:EXT:nj_blog/Resources/Private/Language/locallang_db.xml:tx_njblog_domain_model_postelement.etype.textImage', 'textimage'),
					array('LLL:EXT:nj_blog/Resources/Private/Language/locallang_db.xml:tx_njblog_domain_model_postelement.etype.image', 'image'),
					array('LLL:EXT:nj_blog/Resources/Private/Language/locallang_db.xml:tx_njblog_domain_model_postelement.etype.youtube', 'youtube'),
					array('LLL:EXT:nj_blog/Resources/Private/Language/locallang_db.xml:tx_njblog_domain_model_postelement.etype.code', 'code')
				),
				'maxitems' => 1,
				'default' => 'text',
			)
		),
			
		'crdate' => Array (
			'exclude' => 1,
			'label' => 'Creation date',
			'config' => Array (
				'type' => 'none',
				'format' => 'date',
				'eval' => 'date',
			)
		),
		'sys_language_uid' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.language',
			
			'config' => Array (
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => Array(
					Array('LLL:EXT:lang/locallang_general.php:LGL.allLanguages',-1),
					Array('LLL:EXT:lang/locallang_general.php:LGL.default_value',0)
				)
			)
		),
		'l18n_parent' => Array (
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.l18n_parent',
			'config' => Array (
				'type' => 'select',
				'items' => Array (
					Array('', 0)
				),
				'foreign_table' => 'tx_njblog_domain_model_post',
				'foreign_table_where' => 'AND tx_njblog_domain_model_post.uid=###REC_FIELD_l18n_parent### AND tx_njblog_domain_model_post.sys_language_uid IN (-1,0)',
			)
		),
		'l18n_diffsource' => Array(
			'config'=>array(
				'type'=>'passthrough'
			)
		),
		't3ver_label' => Array (
			'displayCond' => 'FIELD:t3ver_label:REQ:true',
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.versionLabel',
			'config' => Array (
				'type'=>'none',
				'cols' => 27
			)
		),
		'hidden' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config'  => array(
				'type' => 'check'
			)
		),

		'headline' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:nj_blog/Resources/Private/Language/locallang_db.xml:tx_njblog_domain_model_postelement.headline',
			'config' => array(
				'type' => 'input',
				'size' => 40,
				'eval' => 'trim',
			)
		),
			
		'headline_hidden' => array(
				'exclude' => 1,
				'label'   => 'LLL:EXT:nj_blog/Resources/Private/Language/locallang_db.xml:tx_njblog_domain_model_postelement.headlineHidden',
				'config'  => array(
						'type' => 'check'
				)
		),
			
		'headline_style' => Array (
			'exclude' => 0,
			'label'   => 'LLL:EXT:nj_blog/Resources/Private/Language/locallang_db.xml:tx_njblog_domain_model_postelement.headlineStyle',
			'config' => Array (
				'type' => 'select',
				'items' => array(
						array('LLL:EXT:nj_blog/Resources/Private/Language/locallang_db.xml:tx_njblog_domain_model_postelement.headlineStyle.1', 'h1'),
						array('LLL:EXT:nj_blog/Resources/Private/Language/locallang_db.xml:tx_njblog_domain_model_postelement.headlineStyle.2', 'h2'),
						array('LLL:EXT:nj_blog/Resources/Private/Language/locallang_db.xml:tx_njblog_domain_model_postelement.headlineStyle.3', 'h3'),
				),
				'maxitems' => 1,
			)
		),
			
		'content' => array(
			'exclude' => 0,
			'label' => '',
			'defaultExtras' => 'richtext[*]',
			'config' => array(
				'type' => 'text',
				'cols' => 100,
				'rows' => 12,
				'wizards' => Array(
					'_PADDING' => 4,
					'RTE' => Array(
						'notNewRecords' => 1,
						'RTEonly' => 0,
						'type' => 'script',
						'title' => 'LLL:EXT:cms/locallang_ttc.php:bodytext.W.RTE',
						'icon' => 'wizard_rte2.gif',
						'script' => 'wizard_rte.php'
					)
				)
			)
		),
			
		'img' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:nj_blog/Resources/Private/Language/locallang_db.xml:general.image',
			'config'  => array(
				'type'          => 'group',
				'internal_type' => 'file',
				'allowed'       => $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'],
				'max_size'      => 3000,
				'uploadfolder'  => 'fileadmin/user_upload/tx_njblog',
				'show_thumbs'   => 1,
				'size'          => 1,
				'maxitems'      => 1,
				'minitems'      => 0
			)
				
		),
		'img_copyright' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:nj_blog/Resources/Private/Language/locallang_db.xml:tx_njblog_domain_model_postelement.imageCopyright',
			'config' => array(
				'type' => 'input',
				'size' => 40,
				'eval' => 'trim',
			)
		),
		'img_adjustment' => Array (
			'exclude' => 0,
			'label'   => 'LLL:EXT:nj_blog/Resources/Private/Language/locallang_db.xml:general.imageAdjustment',
			'config' => Array (
				'type' => 'select',
				'items' => array(
					array('LLL:EXT:nj_blog/Resources/Private/Language/locallang_db.xml:general.imageAdjustment.center', 'center'),
					array('LLL:EXT:nj_blog/Resources/Private/Language/locallang_db.xml:general.imageAdjustment.left', 'left'),
					array('LLL:EXT:nj_blog/Resources/Private/Language/locallang_db.xml:general.imageAdjustment.right', 'right'),
				),
				'maxitems' => 1,
			)
		),
		'img_width' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:nj_blog/Resources/Private/Language/locallang_db.xml:general.imageWidth',
			'config' => array(
				'type' => 'input',
				'size' => 5,
				'eval' => 'int,trim',
				'max' => 5
			)
		),
		'img_height' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:nj_blog/Resources/Private/Language/locallang_db.xml:general.imageHeight',
			'config' => array(
				'type' => 'input',
				'size' => 5,
				'eval' => 'int,trim',
				'max' => 5
			)
		),
	
		'img_use_thumb' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:nj_blog/Resources/Private/Language/locallang_db.xml:tx_njblog_domain_model_postelement.useThumbnail',
			'config' => array(
				'type' => 'check',
				'default' => 0
			)
		),
			
		'yt_video_id' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:nj_blog/Resources/Private/Language/locallang_db.xml:tx_njblog_domain_model_postelement.videoId',
			'config' => array(
				'type' => 'input',
				'size' => 40,
				'eval' => 'trim',
				'max'  => 256
			)
		),
			
		'yt_video_width' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:nj_blog/Resources/Private/Language/locallang_db.xml:tx_njblog_domain_model_postelement.videoWidth',
			'config' => array(
				'type' => 'input',
				'size' => 5,
				'eval' => 'int,trim',
				'max' => 5
			)
		),
			
		'yt_ratio' => Array (
			'exclude' => 0,
			'label'   => 'LLL:EXT:nj_blog/Resources/Private/Language/locallang_db.xml:tx_njblog_domain_model_postelement.ratio',
			'config' => Array (
				'type' => 'select',
				'items' => array(
					array('16:9', 0),
					array('4:3', 1),
				
				),
				'maxitems' => 1,
			)
		),
			
		'yt_show_proposals' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:nj_blog/Resources/Private/Language/locallang_db.xml:tx_njblog_domain_model_postelement.showProposals',
			'config' => array(
				'type' => 'check',
				'default' => 0
			)
		),
			
		'yt_allow_fullscreen' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:nj_blog/Resources/Private/Language/locallang_db.xml:tx_njblog_domain_model_postelement.allowFullscreen',
			'config' => array(
				'type' => 'check',
				'default' => 0
			)
		),
			
		'yt_additional' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:nj_blog/Resources/Private/Language/locallang_db.xml:tx_njblog_domain_model_postelement.additionalSettings',
			'config'  => array(
				'type' => 'input',
				'size' => 40,
				'eval' => 'trim',
				'max'  => 256
			)
		),
			
//category, poster, editor, lastupdate, , , rellinks, , hits			
			
			
			
			
	),
	'types' => array(
		'1' => array(
				'showitem' => 'etype'
		),
		'text' => 		array('showitem' =>	$type_general.','.$type_content),
		'textimage' => 	array('showitem' =>	$type_general.','.$type_content.','.$type_image),
		'image' => 		array('showitem' =>	$type_general.','.$type_image),
		'youtube' => 	array('showitem' =>	$type_general.','.$type_youtube),
		'code' => 		array('showitem' =>	$type_general.','.$type_code),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
		'etype' => array('showitem' => 'etype, hidden','canNotCollapse' => 1),
		'headline' => array('showitem' => 'headline, headline_style, headline_hidden','canNotCollapse' => 1) 
	)
	
);

// '0' => Array('showitem' =>
// 		'hidden, type;;;;1-1-1,title;;;;2-2-2,short,bodytext;;2;richtext:rte_transform[flag=rte_enabled|mode=ts];4-4-4,
// 			--div--;LLL:EXT:tt_news/locallang_tca.xml:tt_news.tabs.special, datetime;;;;2-2-2,archivedate,author;;3;; ;;;;2-2-2,
// 				keywords;;;;2-2-2,sys_language_uid;;1;;3-3-3,
// 			--div--;LLL:EXT:tt_news/locallang_tca.xml:tt_news.tabs.media, image;;;;1-1-1,imagecaption;;5;;,links;;;;2-2-2,news_files;;;;4-4-4,
// 			--div--;LLL:EXT:tt_news/locallang_tca.xml:tt_news.tabs.catAndRels, category;;;;3-3-3,related;;;;3-3-3,
// 			--div--;LLL:EXT:tt_news/locallang_tca.xml:tt_news.tabs.access, starttime,endtime,fe_group,editlock,
// 			--div--;LLL:EXT:tt_news/locallang_tca.xml:tt_news.tabs.extended,
// 			'),

// "types" => array (
// 		"0" => array("showitem" => "--div--;General,sys_language_uid;;;;1-1-1, l18n_parent, l18n_diffsource, hidden;;1, company,
//                                     lastname, firstname, address, zip, city, country, email, url, --div--;advanced, logo, logo2, category, --div--;address 1, area, phone,
//                                     mobile, fax,--div--;address 2,phone2,--div--;Description, description,
//                                     longdescription;;;richtext:rte_transform[flag=rte_enabled|mode=css]")
// ),
//title, category, intro, content, inhome, highlight, poster, editor, lastupdate, tags, source, rellinks, permit_comments, comments_permit_guest, hits



?>