<?php
if (!defined ('TYPO3_MODE')) die ('Access denied.');

$TCA['tx_njblog_domain_model_tag'] = array(
	'ctrl' => $TCA['tx_njblog_domain_model_tag']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'title'
	),
	'columns' => array(
		'title' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:nj_blog/Resources/Private/Language/locallang_db.xml:tx_njblog_domain_model_tag.title',
			'config'  => array(
				'type'	=> 'input',
				'size'	=> 40,
				'eval'	=> 'trim,required',
				'max'	=> 256
			)
		),
	),
	'types' => array(
		'0' => array('showitem' => 'sys_language_uid, title')
	),
	'palettes' => array(
		'1' => array('showitem' => '')
	)
);
?>