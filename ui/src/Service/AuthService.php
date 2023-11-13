<? declare(strict_types=1);

namespace App\Service;

use App\DTO\Register;
use App\Entity\User;
use App\Repository\UserRepository;
use App\Service\Interface\AuthServiceInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AuthService implements AuthServiceInterface
{
    public function __construct(
        private readonly UserRepository $repository,
        private readonly LoggerInterface $logger,
        private readonly UserPasswordHasherInterface $passwordHasher,
    ) {
    }

    public function register(Register $request): bool
    {
        try {
            $user = (new User())
                ->setUsername($request->username);

            $isUsernameUnique = $this->repository->count([
                'username' => $user->getUserIdentifier()
            ]) < 1;

            if (!$isUsernameUnique)
                return false;

            $user
                ->setPassword($this->passwordHasher->hashPassword($user, $request->password))
                ->setRoles($user->getRoles());

            return $this->repository->create($user);
        } catch (\Exception $ex) {
            return false;
        }
    }
}