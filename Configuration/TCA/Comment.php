<?php
if (!defined ('TYPO3_MODE')) die ('Access denied.');

$TCA['tx_njblog_domain_model_comment'] = array(
	'ctrl' => $TCA['tx_njblog_domain_model_comment']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'crdate, author, email'
	),
	'columns' => array(
		'crdate' => array(
			'config'  => array(
				'type'     => 'passthrough',
			)
		),
		'cruser_id' => array(
			'config'  => array(
				'type'     => 'passthrough',
			)
		),
		'tstamp' => array(
			'config'  => array(
				'type'     => 'passthrough',
			)
		),
		'hidden' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config'  => array(
				'type' => 'check'
			)
		),
		'post' => array(
			'config' => array(
				'type' => 'passthrough',
			)
		),
		'author' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:blog_example/Resources/Private/Language/locallang_db.xml:tx_blogexample_domain_model_comment.author',
			'config'  => array(
				'type' => 'input',
				'size' => 20,
				'eval' => 'trim',
				'max'  => 256
			)
		),
		'email' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:blog_example/Resources/Private/Language/locallang_db.xml:general.email',
			'config'  => array(
				'type' => 'input',
				'size' => 20,
				'eval' => 'trim, required',
				'max'  => 256
			)
		),
		'email' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:blog_example/Resources/Private/Language/locallang_db.xml:general.url',
			'config'  => array(
				'type' => 'input',
				'size' => 20,
				'eval' => 'trim, required',
				'max'  => 256
			)
		),
		'content' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:nj_blog/Resources/Private/Language/locallang_db.xml:general.content',
			'config'  => array(
				'type' => 'text',
				'rows' => 30,
				'cols' => 80
			)
		),	
	),
	'types' => array(
			'0' => array('showitem' => 'hidden, sys_language_uid, date, post, content')
	),
	'palettes' => array(
			'1' => array('showitem' => '')
	)

);

?>