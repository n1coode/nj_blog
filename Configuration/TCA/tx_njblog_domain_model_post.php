<?php
if (!defined ('TYPO3_MODE')) die ('Access denied.');

$nj_collection_lang_file	= \N1coode\NjCollection\Utility\Constants::NJ_EXT_LANG_FILE_BACKEND;

$nj_ext_key					= \N1coode\NjBlog\Utility\Constants::NJ_EXT_KEY;
$nj_ext_namespace			= \N1coode\NjBlog\Utility\Constants::NJ_EXT_NAMESPACE;
$nj_ext_path				= \N1coode\NjBlog\Utility\Constants::NJ_EXT_PATH;
$nj_ext_title				= \N1coode\NjBlog\Utility\Constants::NJ_EXT_TITLE;

$nj_ext_lang_file			= \N1coode\NjBlog\Utility\Constants::NJ_EXT_LANG_FILE_BACKEND;

$nj_domain_model = 'Post';
$nj_domain = strtolower($nj_domain_model);

return array(
	'ctrl' => array(
		'crdate' => 'crdate',
		'default_sortby' => 'ORDER BY title ASC',
		'delete' => 'deleted',
		'dividers2tabs' => TRUE,
		'enablecolumns' => array(
			'disabled' => 'hidden'
		),
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($nj_ext_path) . 'Resources/Public/Icons/' . $nj_ext_key . '_domain_model_' . $nj_domain . '.svg',
		'l10n_mode' => 'mergeIfNotBlank',
		'label' => 'title',
		'languageField' => 'sys_language_uid',
		'origUid' => 't3_origuid',
		'requestUpdate' => 'show_conclusion,show_description,show_intro',
		//'sortby' => 'sorting',
		'title' => $nj_ext_lang_file.'model.'.$nj_domain,
		'transOrigDiffSourceField' => 'l18n_diffsource',
        'transOrigPointerField' => 'l18n_parent',
        'tstamp' => 'tstamp',
		'versioning_followPages' => TRUE,
		'versioningWS' => 2,
	),
	'interface' => array(
		'showRecordFieldList' => 'title, description',
		'maxDBListItems' => 100,
		'maxSingleDBListItems' => 500
	),
	'feInterface' => array(
		'fe_admin_fieldList' => 'title',
	),
	'columns' => array(
		'ce' => Array(
			'exclude' => 0,
			'label'   => $nj_ext_lang_file.'label.model.'.$nj_domain.'.ce',
			'config' => Array(
				'type' => 'inline',
				
				'foreign_table' => 'tx_njcollection_domain_model_content',
				'foreign_sortby' => 'sorting',
				'foreign_field' => 'foreign_uid',
				'foreign_table_field' => 'foreign_table',
				'maxitems' => 99,
				'appearance' => Array(
					'collapseAll' => 1,
					'expandSingle' => 1,
				),
			),
		),
		'inhome' => array(
			'exclude' => 0,
			'label' => $nj_ext_lang_file.'label.model.post.inHome',
			'config' => array(
				'type' => 'check',
				'default' => 1
			)
		),
		'highlight' => array(
			'exclude' => 0,
			'label' => $nj_ext_lang_file.'label.model.post.highlight',
			'config' => array(
				'type' => 'check',
				'default' => 0
			)
		),
		'title' => array(
			'exclude' => 0,
			'label'   => $nj_collection_lang_file.'label.general.title',
			'config'  => array(
				'type' => 'input',
				'size' => 40,
				'eval' => 'trim,required',
				'max'  => 256
			)
		),
		'tstamp' => Array (
			'exclude' => 1,
			'label' => 'Creation date',
			'config' => Array (
				'type' => 'none',
				'format' => 'date',
				'eval' => 'date',
			)
		),
	),
	'types' => array(
		'0' => array('showitem' =>
			'--div--;'.$nj_collection_lang_file.'tab.general.generalSettings,
			title, description,date, highlight,client,ce,
			--div--;'.$nj_collection_lang_file.'tab.general.categorization,
			categories, products, 
			--div--;'.$nj_collection_lang_file.'tab.general.description,
			show_intro,intro,show_description,show_conclusion,conclusion,
			--div--;'.$nj_collection_lang_file.'tab.general.images,
			images'
		)
	),
	'palettes' => array(
		'1' => array('showitem' => 'uid'),
	),
);