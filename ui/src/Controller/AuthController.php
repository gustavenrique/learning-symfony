<? declare(strict_types=1);

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use Doctrine\ORM\EntityManagerInterface;
use Rompetomp\InertiaBundle\Service\InertiaInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/auth')]
class AuthController extends AbstractController
{
    public function __construct(private readonly InertiaInterface $inertia)
    {
    }

    #[Route('/register', name: 'auth.register', methods: ['GET'])]
    public function register(): Response
    {
        return $this->inertia->render('Auth/Register');
    }

    #[Route('/login', name: 'auth.login', methods: ['GET'])]
    public function login(): Response
    {
        return $this->inertia->render('Auth/Login');
    }
}
