<?php
/**
 * Comment service.
 */

namespace App\Service;

use App\Entity\Comment;
use App\Repository\CommentRepository;
use App\Repository\TaskRepository;
use Doctrine\ORM\NonUniqueResultException;
use Knp\Component\Pager\Pagination\PaginationInterface;
use Knp\Component\Pager\PaginatorInterface;

/**
 * Class CommentService.
 */
class CommentService implements CommentServiceInterface
{
    /**
     * Comment repository.
     */
    private CommentRepository $commentRepository;

    /**
     * Paginator.
     */
    private PaginatorInterface $paginator;

    /**
     * Task Repository.
     */
    private TaskRepository $taskRepository;

    /**
     * Constructor.
     *
     * @param CommentRepository  $commentRepository Comment repository
     * @param PaginatorInterface $paginator         Paginator
     * @param TaskRepository     $taskRepository    Task repository
     */
    public function __construct(CommentRepository $commentRepository, PaginatorInterface $paginator, TaskRepository $taskRepository)
    {
        $this->commentRepository = $commentRepository;
        $this->paginator = $paginator;
        $this->taskRepository = $taskRepository;
    }

    /**
     * Get paginated list.
     *
     * @param int $page Page number
     *
     * @return PaginationInterface<string, mixed> Paginated list
     */
    public function getPaginatedList(int $page): PaginationInterface
    {
        return $this->paginator->paginate(
            $this->commentRepository->queryAll(),
            $page,
            CommentRepository::PAGINATOR_ITEMS_PER_PAGE
        );
    }

    /**
     * Save entity.
     *
     * @param Comment $comment Comment entity
     */
    public function save(Comment $comment): void
    {
        $this->commentRepository->save($comment);
    }

    /**
     * Delete entity.
     *
     * @param Comment $comment Comment entity
     */
    public function delete(Comment $comment): void
    {
        $this->commentRepository->remove($comment);
    }

    /**
     * Find by id.
     *
     * @param int $id Comment id
     *
     * @return Comment|null Comment entity
     *
     * @throws NonUniqueResultException
     */
    public function findOneById(int $id): ?Comment
    {
        return $this->commentRepository->findOneById($id);
    }
}
