<?php
namespace N1coode\NjBlog\Domain\Repository;
 
/**
 * @author n1coode
 * @package nj_blog
 */
class PostRepository extends \N1coode\NjBlog\Domain\Repository\AbstractRepository
{
	/**
	 * Finds all posts by the specified blog
	 *
	 * @param \N1coode\NjBlog\Domain\Model\Blog $blog The blog the post must refer to
	 * @return \TYPO3\CMS\Extbase\Persistence\QueryResultInterface The posts
	 */
	public function findAllByBlog(\N1coode\NjBlog\Domain\Model\Blog $blog) {
		$query = $this->createQuery();
		return $query
		->matching(
			$query->logicalAnd(
				$query->equals('blog', $blog),
				$query->equals('highlight', 0),
				$query->equals('inhome', 1)
			)
		)
		->setLimit(10)
		->execute();
	}
	
	/**
	 * Finds all remaining posts of the blog
	 *
	 * @param \N1coode\NjBlog\Domain\Model\Post $post The reference post
	 * @return \TYPO3\CMS\Extbase\Persistence\QueryResultInterface The posts
	 */
	public function findRemaining(\N1coode\NjBlog\Domain\Model\Post $post) {
		$blog = $post->getBlog();
		$query = $this->createQuery();
		return $query
		->matching(
				$query->logicalAnd(
						$query->equals('blog', $blog),
						$query->logicalNot(
								$query->equals('uid', $post->getUid())
						)
				)
		)
		->execute();
	}
	
	/**
	 * Finds most recent posts by the specified blog
	 *
	 * @param \N1coode\NjBlog\Domain\Model\Blog $blog The blog the post must refer to
	 * @param integer $limit The number of posts to return at max
	 * @return \TYPO3\CMS\Extbase\Persistence\QueryResultInterface The posts
	 */
	public function findRecentByBlog(\N1coode\NjBlog\Domain\Model\Blog $blog, $limit = 5) {
		$query = $this->createQuery();
		return $query
		->matching(
				$query->equals('blog', $blog)
		)
		->setLimit((integer)$limit)
		->execute();
	}
	
	/**
	 * Finds all highlighted posts by the specified blog
	 * 
	 * @param \N1coode\NjBlog\Domain\Model\Blog $blog The blog the post must refer to
	 * @return \TYPO3\CMS\Extbase\Persistence\QueryResultInterface The highlights
	 */
	public function findHighlightsByBlog(\N1coode\NjBlog\Domain\Model\Blog $blog)
	{
		$query = $this->createQuery();
		return $query
		->matching(
			$query->logicalAnd(
				$query->equals('blog', $blog),
				$query->equals('highlight', 1)
			)
		)
		->setLimit(5)
		->execute();
	}
}
?>