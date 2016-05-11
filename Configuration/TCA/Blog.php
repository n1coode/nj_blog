<?php
if (!defined ('TYPO3_MODE')) die ('Access denied.');

$TCA['tx_njblog_domain_model_blog']['ctrl']['type'] = 'permit_comments';

$TCA['tx_njblog_domain_model_blog'] = array(
	'ctrl' => $TCA['tx_njblog_domain_model_blog']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'title, description, entries_limit'
	),
	'columns' => array(
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
				'foreign_table' => 'tx_njblog_domain_model_blog',
				'foreign_table_where' => 'AND tx_njblog_domain_model_blog.uid=###REC_FIELD_l18n_parent### AND tx_njblog_domain_model_blog.sys_language_uid IN (-1,0)',
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
		
		'title' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:nj_blog/Resources/Private/Language/locallang_db.xml:tx_njblog_domain_model_blog.title',
			'config'  => array(
				'type' => 'input',
				'size' => 40,
				'eval' => 'trim,required',
				'max'  => 256
			)
		),
		'description' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:nj_blog/Resources/Private/Language/locallang_db.xml:tx_njblog_domain_model_blog.description',
			'config'  => array(
				'type' => 'text',
				'eval' => 'trim',
				'cols' => 80,
				'rows' => 5
			)
		),
		
		'posts' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:blog_example/Resources/Private/Language/locallang_db.xml:tx_blogexample_domain_model_blog.posts',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_njblog_domain_model_post',
				'foreign_field' => 'blog',
				'foreign_sortby' => 'sorting',
				'maxitems'      => 999999,
				'appearance' => array(
						'collapseAll' => 1,
						'expandSingle' => 1,
				),
			)
		),
			
		'entries_limit' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:nj_blog/Resources/Private/Language/locallang_db.xml:tx_njblog_domain_model_blog.entriesLimit',
			'config' => array(
				'type' => 'input',
				'eval' => 'int,trim',
				'size' => 5,
				'max' => 5
			)
		),
		'use_ajax' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:nj_blog/Resources/Private/Language/locallang_db.xml:tx_njblog_domain_model_blog.useAjax',
			'config' => array(
				'type' => 'check',
			)
		),
		'use_readmore' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:nj_blog/Resources/Private/Language/locallang_db.xml:tx_njblog_domain_model_blog.useReadmore',
			'config' => array(
				'type' => 'check',
			)
		),
		'show_author' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:nj_blog/Resources/Private/Language/locallang_db.xml:tx_njblog_domain_model_blog.showAuthor',
			'config' => array(
				'type' => 'check',
			)
		),
		'show_authorlink' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:nj_blog/Resources/Private/Language/locallang_db.xml:tx_njblog_domain_model_blog.showAuthorlink',
			'config' => array(
				'type' => 'check',
			)
		),
		'permit_comments' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:nj_blog/Resources/Private/Language/locallang_db.xml:tx_njblog_domain_model_blog.permitComments',
			'config' => array(
				'type' => 'check',
			)
		),
		'comments_limit' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:nj_blog/Resources/Private/Language/locallang_db.xml:tx_njblog_domain_model_blog.commentsLimit',
			'config' => array(
				'type' => 'input',
				'size' => 5,
				'eval' => 'int,trim',
				'max' => 5
			)
		),
		'comments_permit_guest' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:nj_blog/Resources/Private/Language/locallang_db.xml:tx_njblog_domain_model_blog.commentsPermitGuest',
			'config' => array(
				'type' => 'check',
			)
		),
		'comments_show_email' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:nj_blog/Resources/Private/Language/locallang_db.xml:tx_njblog_domain_model_blog.commentsShowEmail',
			'config' => array(
				'type' => 'check',
			)
		),
		'comments_show_url' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:nj_blog/Resources/Private/Language/locallang_db.xml:tx_njblog_domain_model_blog.commentsShowUrl',
			'config' => array(
				'type' => 'check',
			)
		),
		'activate_print' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:nj_blog/Resources/Private/Language/locallang_db.xml:tx_njblog_domain_model_blog.activatePrint',
			'config' => array(
				'type' => 'check',
			)
		),
		'activate_pdf' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:nj_blog/Resources/Private/Language/locallang_db.xml:tx_njblog_domain_model_blog.activatePdf',
			'config' => array(
				'type' => 'check',
			)
		),
		'activate_titlepic' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:nj_blog/Resources/Private/Language/locallang_db.xml:tx_njblog_domain_model_blog.activateTitlepic',
			'config' => array(
				'type' => 'check',
			)
		),
		'activate_double_layout' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:nj_blog/Resources/Private/Language/locallang_db.xml:tx_njblog_domain_model_blog.activateDoubleLayout',
			'config' => array(
				'type' => 'check',
			)
		),
		'titlepic_width' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:nj_blog/Resources/Private/Language/locallang_db.xml:tx_njblog_domain_model_blog.titlepicWidth',
			'config' => array(
				'type' => 'input',
				'size' => 5,
				'eval' => 'int,trim',
				'max' => 5
			)
		),
		'titlepic_height' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:nj_blog/Resources/Private/Language/locallang_db.xml:tx_njblog_domain_model_blog.titlepicHeight',
			'config' => array(
				'type' => 'input',
				'size' => 5,
				'eval' => 'int,trim',
				'max' => 5
			)
		),
		
			
	),
	'types' => array(
		'0' => array('showitem' =>
					'--div--;LLL:EXT:nj_blog/Resources/Private/Language/locallang_db.xml:general.tabs.generalSettings,
					hidden, sys_language_uid, title, description,
				--div--;LLL:EXT:nj_blog/Resources/Private/Language/locallang_db.xml:tx_njblog_domain_model_blog.tabs.displayOptions,
					entries_limit, use_ajax, use_readmore, show_author, show_authorlink,
				--div--;LLL:EXT:nj_blog/Resources/Private/Language/locallang_db.xml:general.tabs.commentSettings,
					permit_comments,
				--div--;LLL:EXT:nj_blog/Resources/Private/Language/locallang_db.xml:tx_njblog_domain_model_blog.tabs.extras,
					activate_double_layout, activate_titlepic, activate_print, activate_pdf'),
		'1' => array('showitem' => 
				'--div--;LLL:EXT:nj_blog/Resources/Private/Language/locallang_db.xml:general.tabs.generalSettings,
					hidden, sys_language_uid, title, description,
				--div--;LLL:EXT:nj_blog/Resources/Private/Language/locallang_db.xml:tx_njblog_domain_model_blog.tabs.displayOptions,
					entries_limit, use_ajax, use_readmore, show_author, show_authorlink, 
				--div--;LLL:EXT:nj_blog/Resources/Private/Language/locallang_db.xml:general.tabs.commentSettings,
					permit_comments, comments_limit, comments_permit_guest, comments_show_email, comments_show_url,
				--div--;LLL:EXT:nj_blog/Resources/Private/Language/locallang_db.xml:tx_njblog_domain_model_blog.tabs.extras,
					activate_double_layout, activate_titlepic, activate_print, activate_pdf')
	),
	'palettes' => array(
		'1' => array('showitem' => '')
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




?>