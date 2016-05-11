<?php
namespace N1coode\NjBlog\Controller;

class PostController extends \N1coode\NjBlog\Controller\AbstractController
{
	
	
	
	
	/**
	 * Displays a list of posts. If $tag is set only posts matching this tag are shown
	 *
	 * @param \N1coode\NjBlog\Domain\Model\Blog $blog The blog to show the posts of
	 * @param string $tag The name of the tag to show the posts for
	 * @return void
	 */
	public function indexAction(\N1coode\NjBlog\Domain\Model\Blog $blog, $tag = NULL) 
	{
		if (empty($tag)) {
			$posts = $this->postRepository->findByBlog($blog);
		} 
		else 
		{
			$tag = urldecode($tag);
			$posts = $this->postRepository->findByTagAndBlog($tag, $blog);
			$highlights = $this->postRepository->findHighlightsByBlog($blog);
			$this->view->assign('highlights', $highlights);
			$this->view->assign('tag', $tag);
		}
		$this->view->assign('posts', $posts);
	}
	
	/**
	 * Displays one single post
	 *
	 * @param \N1coode\NjBlog\Domain\Model\Post $post The post to display
	 * @param \N1coode\NjBlog\Domain\Model\Comment $newComment A new comment
	 * @return void
	 * @dontvalidate $newComment
	 */
	public function showAction(\N1coode\NjBlog\Domain\Model\Post $post, \N1coode\NjBlog\Domain\Model\Comment $newComment = NULL) {
		$this->view->assign('post', $post);
		$this->view->assign('newComment', $newComment);
	}
	
	/**
	 * 
	 * @param int $limit
	 */
	public function latestAction($limit = 3)
	{
		$assignValues = [];
		$assignValues['ext'] = parent::setExtSettings();
		
		$this->view->assignMultiple($assignValues);
	}
	
} //end of class \N1coode\NjBlog\Controller\PostController

?>