<? declare(strict_types=1);

namespace App\Controller\Api;

use App\DTO\Login;
use App\DTO\Register;
use App\Service\Interface\AuthServiceInterface;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api/auth')]
class AuthController extends AbstractController
{
    public function __construct(
        private readonly AuthServiceInterface $authService,
        private readonly LoggerInterface $logger,
    ) {
    }

    #[Route('/register', name: 'api.auth.register', methods: ['POST'])]
    public function register(#[MapRequestPayload] Register $body)
    {
        $response = $this->authService->register($body);

        return $this
            ->json($response)
            ->setStatusCode($response ? 200 : 500);
    }

    #[Route(path: '/login', name: 'api.auth.login', methods: ['POST'])]
    public function login(Request $request)
    {
        return $request;
    }

    #[Route(path: '/logout', name: 'api.auth.logout')]
    public function logout(): void
    {
        // throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}