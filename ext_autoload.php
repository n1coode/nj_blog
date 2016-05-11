<?php
$extensionPath = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('nj_blog');

$tmp = array(
	//'tx_njportfolio_utility_ajaxdispatcher' => $extensionPath . 'Classes/Utility/AjaxDispatcher.php',
	'N1coode\NjBlog\Controller\AbstractController' => $extensionPath . 'Classes/Controller/AbstractController.php',
	'N1coode\NjBlog\Domain\Repository\AbstractRepository' => $extensionPath . 'Classes/Domain/Repository/AbstractRepository.php',	
	
	'N1coode\NjBlog\Controller\BlogController' => $extensionPath . 'Classes/Controller/BlogController.php',
	'N1coode\NjBlog\Domain\Model\Blog' => $extensionPath . 'Classes/Domain/Model/Blog.php',
	'N1coode\NjBlog\Domain\Repository\BlogRepository' => $extensionPath . 'Classes/Domain/Repository/BlogRepository.php',
	
	'N1coode\NjBlog\Controller\PostController' => $extensionPath . 'Classes/Controller/PostController.php',
	'N1coode\NjBlog\Domain\Model\Post' => $extensionPath . 'Classes/Domain/Model/Post.php',
	'N1coode\NjBlog\Domain\Repository\PostRepository' => $extensionPath . 'Classes/Domain/Repository/PostRepository.php',
);

return $tmp;