<?php
if (!defined ('TYPO3_MODE')) die ('Access denied.');

$nj_extkey = 'tx_njblog';
$nj_extkey_lang = 'nj_blog';

$TCA[$nj_extkey.'_domain_model_link'] = array(
	'ctrl' => $TCA[$nj_extkey.'_domain_model_link']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'url,title, description',
		'maxDBListItems' => 100,
		'maxSingleDBListItems' => 500
	),
	'feInterface' => array(
		'fe_admin_fieldList' => 'uri',
	),
	'columns' => array(
		'pid' => array(
			'config'  => array(
				'type' => 'passthrough'
			)
		),
		'crdate' => array(
			'config'  => array(
				'type' => 'passthrough',
			)
		),
		'tstamp' => array(
			'config'  => array(
				'type' => 'passthrough',
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
				'foreign_table' => 'tx_njblog_domain_model_link',
				'foreign_table_where' => 'AND tx_njblog_domain_model_link.uid=###REC_FIELD_l18n_parent### AND tx_njblog_domain_model_link.sys_language_uid IN (-1,0)',
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
				'type'    => 'check',
				'default' => 0
			)
		),
		'title' => array(
			'exclude'	=> 0,
			'l10n_mode'	=> 'mergeIfNotBlank',
			'label'   	=> 'LLL:EXT:'.$nj_extkey_lang.'/Resources/Private/Language/locallang_db.xml:general.title',
			'config'  => array(
				'type' => 'input',
				'size' => 40,
				'eval' => 'trim',
				'max'  => 256
			)
		),
		'description' => array(
			'exclude' 	=> 0,
			'l10n_mode' => 'mergeIfNotBlank',
			'label'   	=> 'LLL:EXT:'.$nj_extkey_lang.'/Resources/Private/Language/locallang_db.xml:general.description',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 5,
			)
		),
		'url' => array(
			'exclude' 	=> 0,
			'l10n_mode' => 'mergeIfNotBlank',
			'label'   	=> 'LLL:EXT:'.$nj_extkey_lang.'/Resources/Private/Language/locallang_db.xml:general.link',
			'config'  => array(
				'placeholder'	=> 'http://www.example.org',
				'mode' 			=> 'useOrOverridePlaceholder',
				'type' 			=> 'input',
				'size' 			=> 40,
				'eval' 			=> 'trim,required',
				'max'  			=> 256
			)
		),
	),
	'types' => array(
		'0' => array('showitem' => 'title,url,description'	)
	),
	'palettes' => array(
		'1' => array('showitem' => 'uid'),
	),
);
?>