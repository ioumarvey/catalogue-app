<?php
/**
 * Guest User service.
 */

namespace App\Service;

use App\Entity\GuestUser;
use App\Repository\GuestUserRepository;

/**
 * Class GuestUserService.
 */
class GuestUserService implements GuestUserServiceInterface
{
    /**
     * GuestUser repository.
     */
    private GuestUserRepository $guestUserRepository;

    /**
     * GuestUserService constructor.
     *
     * @param GuestUserRepository $guestUserRepository GuestUser repository
     */
    public function __construct(GuestUserRepository $guestUserRepository)
    {
        $this->guestUserRepository = $guestUserRepository;
    }

    /**
     * Save guest user.
     *
     * @param GuestUser $guestUser GuestUser entity
     */
    public function save(GuestUser $guestUser): void
    {
        if ($this->guestUserRepository->findOneByEmail($guestUser->getEmail())) {
            return;
        }

        $this->guestUserRepository->save($guestUser);
    }
}
