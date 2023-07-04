<?php
/**
 * Comment fixtures.
 */

namespace App\DataFixtures;

use App\Entity\Comment;
use App\Entity\Task;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

/**
 * Class CommentFixtures.
 *
 * @psalm-suppress MissingConstructor
 */
class CommentFixtures extends AbstractBaseFixtures implements DependentFixtureInterface
{
    /**
     * Load data.
     *
     * @psalm-suppress PossiblyNullReference
     * @psalm-suppress UnusedClosureParam
     */
    public function loadData(): void
    {
        $this->createMany(20, 'comments', function () {
            $comment = new Comment();
            $comment->setContent($this->faker->sentence);

            /** @var Task $task */
            $task = $this->getRandomReference('tasks');
            $comment->setTask($task);

            $user = $this->getRandomReference('users');
            $comment->setAuthor($user);
            $comment->setNick($this->faker->unique()->word);

            return $comment;
        });

        $this->manager->flush();
    }

    /**
     * This method must return an array of fixtures classes
     * on which the implementing class depends on.
     *
     * @return string[] of dependencies
     *
     * @psalm-return array{0: TaskFixtures::class, 1: UserFixtures::class}
     */
    public function getDependencies(): array
    {
        return [TaskFixtures::class, UserFixtures::class];
    }
}
