<?php
if (!defined ('TYPO3_MODE')) die ('Access denied.');

$nj_collection_lang_file	= \N1coode\NjCollection\Utility\Constants::NJ_EXT_LANG_FILE_BACKEND;

$nj_ext_key					= \N1coode\NjBlog\Utility\Constants::NJ_EXT_KEY;
$nj_ext_namespace			= \N1coode\NjBlog\Utility\Constants::NJ_EXT_NAMESPACE;
$nj_ext_path				= \N1coode\NjBlog\Utility\Constants::NJ_EXT_PATH;
$nj_ext_title				= \N1coode\NjBlog\Utility\Constants::NJ_EXT_TITLE;

$nj_ext_lang_file			= \N1coode\NjBlog\Utility\Constants::NJ_EXT_LANG_FILE_BACKEND;

$nj_domain_model = 'Source';
$nj_domain = strtolower($nj_domain_model);


/**
 * The field to switch the types is declared in ext_tables.php
 */
$type_general =		'--div--;'.$nj_collection_lang_file.'tab.general.generalInformation,title, description,'
						.'--div--;'.$nj_collection_lang_file.'tab.general.details,type,';
		
$type_url =			$type_general.'url,status_quo,author';
$type_book =		$type_general.'author';
$type_magazine =	$type_general.'author';
$type_newspaper =	$type_general.'author';
$type_video =		$type_general.'status_quo';

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
		'label' => 'title',
		'requestUpdate' => 'type',
		//'sortby' => 'sorting',
		'title' => $nj_ext_lang_file.'model.'.$nj_domain,
        'tstamp' => 'tstamp',
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
		'author' => array(
			'exclude' => 0,
			'label'   => $nj_ext_lang_file.'label.model.'.$nj_domain.'.author',
			'config'  => array(
				'type' => 'input',
				'size' => 40,
				'eval' => 'trim',
				'max'  => 256
			)
		),
		'description' => array(
			'exclude' => 0,
			'label'   => $nj_collection_lang_file.'label.general.description',
			'config'  => array(
				'type' => 'text',
				'eval' => 'trim',
				'cols' => 60,
				'rows' => 5
			)
		),
		'status_quo' => Array (
			'exclude' => 1,
			'label' => $nj_ext_lang_file.'label.model.'.$nj_domain.'.statusQuo',
			'config' => Array (
				'type' => 'input',
				'format' => 'datetime',
				'eval' => 'datetime',
			)
		),
		'title' => array(
			'exclude' => 0,
			'label'   => $nj_collection_lang_file.'label.general.title',
			'config'  => array(
				'type' => 'input',
				'size' => 40,
				'eval' => 'trim',
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
		'type' => array(
			'exclude' => 0,
			'label'   => $nj_collection_lang_file.'label.general.type',
			'config'  => array(
				'type' => 'select',
				'items' => array(
					array($nj_ext_lang_file.'select.model.source.type.1', 1),
					array($nj_ext_lang_file.'select.model.source.type.2', 2),
					array($nj_ext_lang_file.'select.model.source.type.3', 3),
					array($nj_ext_lang_file.'select.model.source.type.4', 4),
					array($nj_ext_lang_file.'select.model.source.type.5', 5)
				),
				'maxitems' => 1,
				'default' => 1
			)
		),
		'url' => array(
			'exclude' 	=> 0,
			'l10n_mode' => 'mergeIfNotBlank',
			'label'   	=> $nj_collection_lang_file.'label.general.website',
			'config'  => array(
				'placeholder'	=> 'http://www.example.org',
				'mode' 			=> 'useOrOverridePlaceholder',
				'type' 			=> 'input',
				'size' 			=> 40,
				'eval' 			=> 'trim',
				'max'  			=> 256
			)
		),
	),
	'types' => array(
		'1' => array('showitem' => $type_url),
		'2' => array('showitem' => $type_book),
		'3' => array('showitem' => $type_magazine),
		'4' => array('showitem' => $type_newspaper),
		'5' => array('showitem' => $type_video),
	),
	'palettes' => array(
		'1' => array('showitem' => 'uid'),
	),
);	