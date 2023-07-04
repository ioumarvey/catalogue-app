<?php
/**
 * Task service interface.
 */

namespace App\Service;

use App\Entity\Task;
use App\Entity\User;
use Knp\Component\Pager\Pagination\PaginationInterface;

/**
 * Interface TaskServiceInterface.
 */
interface TaskServiceInterface
{
    /**
     * Get paginated tasks.
     *
     * @param int $page Page number
     *
     * @return PaginationInterface Paginated tasks
     */
    public function getPaginatedList(int $page): PaginationInterface;

    /**
     * Get paginated list for favorited.
     *
     * @param int                $page    Page number
     * @param User               $user    Favorited by user
     * @param array<string, int> $filters Filters array
     *
     * @return PaginationInterface<string, mixed> Paginated list
     */
    public function getPaginatedListFav(int $page, User $user, array $filters = []): PaginationInterface;

    /**
     * Save entity.
     *
     * @param Task $task Task entity
     */
    public function save(Task $task): void;

    /**
     * Delete entity.
     *
     * @param Task $task Task entity
     */
    public function delete(Task $task): void;
}
