<?php
if(!defined('TYPO3_MODE')) die ('Access denied.');

$GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][$_EXTKEY] = unserialize($_EXTCONF);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'N1coode.'.$_EXTKEY,
    'Pi1',
    array(
		'Blog' => 'index',
        'Comment' => 'list',
        'Post' => ',latest,list',
    ),
    // non-cacheable actions
    array( 
		'Blog' => 'index',
        'Comment' => 'list',
        'Post' => 'list',
    )
);