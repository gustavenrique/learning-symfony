<? declare(strict_types=1);

namespace App\Controller;

use Rompetomp\InertiaBundle\Service\InertiaInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

#[Route('/auth')]
class AuthController extends AbstractController
{
    public function __construct(
        private readonly InertiaInterface $inertia,
        private readonly CsrfTokenManagerInterface $csrfService
    ) {
    }

    #[Route('/register', name: 'auth.register', methods: ['GET'])]
    public function register(): Response
    {
        return $this->inertia->render('Auth/Register');
    }

    #[Route(path: '/login', name: 'auth.login', methods: ['GET'])]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        if ($this->getUser()) {
            return $this->redirectToRoute('movie.index');
        }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        $payload = [
            'csrf_token' => $this->csrfService->getToken('authenticate')->getValue()
        ];

        if ($lastUsername)
            $payload['last_username'] = $lastUsername;

        if ($error)
            $payload['error'] = $error;

        return $this->inertia->render('Auth/Login', $payload);
    }
}
