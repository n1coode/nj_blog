<?php
namespace N1coode\NjBlog\Controller;

/**
 * @author n1coode
 * @package nj_blog
 */
class BlogController extends \N1coode\NjBlog\Controller\AbstractController
{
	/**
	 * @var \N1coode\NjBlog\Domain\Repository\BlogRepository
	 */
	protected $blogRepository;
	
	/**
	 * @var \N1coode\NjBlog\Domain\Repository\PostRepository
	 */
	protected $postRepository;
	
	/**
+	 * Dependency injection of the Blog Repository
	 *
	 * @param \N1coode\NjBlog\Domain\Repository\BlogRepository $blogRepository
	 * @return void
	 -	 */
	public function injectBlogRepository(\N1coode\NjBlog\Domain\Repository\BlogRepository $blogRepository) 
	{
		$this->blogRepository = $blogRepository;
	}
	
	/**
	 +	 * Dependency injection of the Post Repository
	 *
	 * @param \N1coode\NjBlog\Domain\Repository\PostRepository $postRepository
	 * @return void
	 -	 */
	public function injectPostRepository(\N1coode\NjBlog\Domain\Repository\PostRepository $postRepository)
	{
		$this->postRepository = $postRepository;
	}
	
	/**
	 * Initializes the controller before invoking an action method.
	 *
	 * @return void
	 */
	protected function initializeAction()
	{
		parent::init('Blog');
	}
	
	/**
	 * Index action for this controller. Displays the blog according to a given StoragePid.
	 *
	 * @return void
	 */
	public function indexAction() 
	{
		$blogError = array();
		
		if($this->blogRepository->countAll() > 1)
		{
			$blogError['name'] = 'toManyBlogs';
			$this->view->assign('blogError', $blogError);
		}
		else
		{
			$this->view->assign('blogs', $this->blogRepository->findAll());

			$blogs = $this->blogRepository->findAll();
			foreach ($blogs as $blog)
			{
				$this->view->assign('posts', $this->postRepository->findAllByBlog($blog));
				$this->view->assign('highlights', $this->postRepository->findHighlightsByBlog($blog));
			}
		}
		
	} //end of function indexAction
	
	
// 	public function listAction()
// 	{
// 		$postRepository = t3lib_div::makeInstance('Tx_NjBlog_Domain_Repository_PostRepository');
// 		$posts = $postRepository->findAll();
// 		$this->view->assign('posts', $posts);
		
// 	}
	
} //end of class \N1coode\NjBlog\Controller\BlogController
?>