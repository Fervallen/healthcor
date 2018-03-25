<?php
namespace App\Security;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;

class ApiTokenUserProvider implements UserProviderInterface
{
    /**
     * @var UserRepository
     */
    protected $userRepository;

    public function __construct(EntityManager $entityManager) {
        $this->userRepository = $entityManager->getRepository(User::class);
    }

    public function loadUserByUsername($username): User
    {
        if ($username) {
            $user = $this->userRepository->findByUsername($username);
        }
        if (empty($user)) {
            throw new UsernameNotFoundException(
                sprintf('Username "%s" does not exist.', $username)
            );
        }

        return $user;
    }

    public function getUserByApiToken(string $apiToken): ?User
    {
        return $this->userRepository->findByApiToken($apiToken);
    }

    public function refreshUser(UserInterface $user): User
    {
        if (!$user instanceof User) {
            throw new UnsupportedUserException(
                sprintf('Instances of "%s" are not supported.', get_class($user))
            );
        }

        return $this->loadUserByUsername($user->getUsername());
    }


    public function supportsClass($class): bool
    {
        return User::class === $class;
    }
}
