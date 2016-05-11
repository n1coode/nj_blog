<?php
if (!defined ('TYPO3_MODE')) die ('Access denied.');

$TCA['tx_njblog_domain_model_post'] = array(
	'ctrl' => $TCA['tx_njblog_domain_model_post']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'title, description, entries_limit'
	),
	'columns' => array(
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
		
		'title' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:nj_blog/Resources/Private/Language/locallang_db.xml:tx_njblog_domain_model_post.title',
			'config'  => array(
				'type' => 'input',
				'size' => 40,
				'eval' => 'trim,required',
				'max'  => 256
			)
		),
		
		'blog' => Array (
			'exclude' => 1,
			'label'   => 'LLL:EXT:nj_blog/Resources/Private/Language/locallang_db.xml:tx_njblog_domain_model_post.blog',
			'config' => Array (
				'type' => 'select',
				'foreign_table' => 'tx_njblog_domain_model_blog',
				'foreign_table_where' => 'AND tx_njblog_domain_model_blog.pid=###CURRENT_PID### AND tx_njblog_domain_model_blog.sys_language_uid=0',
				'maxitems' => 1,
			)
		),
			
		'intro' => Array(
			'exclude' => 0,
			'label' => '',
			'config' => Array(
				'type' => 'inline',
				'foreign_table' => 'tx_njblog_domain_model_postelement',
				'foreign_sortby' => 'sorting',
				'maxitems' => 50,
				'appearance' => Array(
					'collapseAll' => 1,
					'expandSingle' => 1,
				),
			),
		),
		
		'content' => Array(
			'exclude' => 0,
			'label' => '',
			'config' => Array(
				'type' => 'inline',
				'foreign_table' => 'tx_njblog_domain_model_postelement',
				'foreign_sortby' => 'sorting',
				'maxitems' => 50,
				'appearance' => Array(
					'collapseAll' => 1,
					'expandSingle' => 1,
				),
			),
		),
			
		'inhome' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:nj_blog/Resources/Private/Language/locallang_db.xml:tx_njblog_domain_model_post.inHome',
			'config' => array(
				'type' => 'check',
				'default' => 1
			)
		),
		'highlight' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:nj_blog/Resources/Private/Language/locallang_db.xml:tx_njblog_domain_model_post.highlight',
			'config' => array(
				'type' => 'check',
				'default' => 0
			)
		),
		'tags' => array(
			'exclude'	=> 0,
			'label'		=> 'LLL:EXT:nj_blog/Resources/Private/Language/locallang_db.xml:tx_njblog_domain_model_post.tags',
			'config'	=> array(
				'type' 					=> 'select',
				'foreign_table' 		=> 'tx_njblog_domain_model_tag',
				'foreign_table_where' 	=> 'ORDER BY tx_njblog_domain_model_tag.title',
				'size'					=> 10,
				'maxitems' 				=> 10,
			)
		),
		'sources' => array(
			'exclude'	=> 0,
			'label'		=> 'LLL:EXT:nj_blog/Resources/Private/Language/locallang_db.xml:tx_njblog_domain_model_post.sources',
			'config'	=> array(
				'type' 					=> 'select',
				'foreign_table' 		=> 'tx_njblog_domain_model_link',
				'foreign_table_where' 	=> 'ORDER BY tx_njblog_domain_model_link.url',
				'size'					=> 10,
				'maxitems' 				=> 10,
			)
		),
		'rel_posts' => array(
			'exclude'	=> 0,
			'label'		=> 'LLL:EXT:nj_blog/Resources/Private/Language/locallang_db.xml:tx_njblog_domain_model_post.relposts',
			'config'	=> array(
				'type' 					=> 'select',
				'foreign_table' 		=> 'tx_njblog_domain_model_post',
				'foreign_table_where' 	=> 'AND tx_njblog_domain_model_post.uid <> ###THIS_UID###',
				'size'					=> 10,
				'maxitems' 				=> 10,
			)
		),
		'permit_comments' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:nj_blog/Resources/Private/Language/locallang_db.xml:tx_njblog_domain_model_post.permitComments',
			'config' => array(
				'type' => 'check',
				'default' => 1
			)
		),
		'comments_permit_guest' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:nj_blog/Resources/Private/Language/locallang_db.xml:tx_njblog_domain_model_post.commentsPermitGuest',
			'config' => array(
				'type' => 'check',
				'default' => 0
			)
		),			
	),
	'types' => array(
		'0' => array('showitem' =>
					'--div--;LLL:EXT:nj_blog/Resources/Private/Language/locallang_db.xml:general.tabs.generalSettings,
						hidden, sys_language_uid, title, blog, inhome, highlight,
					--div--;LLL:EXT:nj_blog/Resources/Private/Language/locallang_db.xml:general.tabs.intro,
						intro, intropic, intropic_adjustment, intropic_width, intropic_height, intropic_copyright,
					--div--;LLL:EXT:nj_blog/Resources/Private/Language/locallang_db.xml:general.tabs.content,
						content,
					--div--;LLL:EXT:nj_blog/Resources/Private/Language/locallang_db.xml:general.tabs.optionalSettings,
						tags, sources, rel_posts,
					--div--;LLL:EXT:nj_blog/Resources/Private/Language/locallang_db.xml:general.tabs.commentSettings,
						permit_comments, comments_permit_guest, comments_permit_smileys'
		)
	),
	'palettes' => array(
		'1' => array('showitem' => '')
	)
);
?>