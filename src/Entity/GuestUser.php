<?php
/**
 * GuestUser entity.
 */

namespace App\Entity;

use App\Repository\GuestUserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class GuestUser.
 */
#[ORM\Entity(repositoryClass: GuestUserRepository::class)]
#[ORM\Table(name: 'guest_users')]
class GuestUser
{
    /**
     * Primary key.
     */
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    /**
     * Email.
     */
    #[ORM\Column(type: 'string', length: 191)]
    #[Assert\NotBlank]
    #[Assert\Email]
    private ?string $email;

    /**
     * Getter for id.
     *
     * @return int|null Id
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Getter for email.
     *
     * @return string|null Email
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * Setter for email.
     *
     * @param string $email Email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }
}
