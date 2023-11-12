<? declare(strict_types=1);

namespace App\Controller\Api;

use App\DTO\Register;
use App\Service\Interface\AuthServiceInterface;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api')]
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
        print_r($body);

        $response = $this->authService->register($body);

        return $this
            ->json($response)
            ->setStatusCode(200);
    }
}