<? declare(strict_types=1);

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Rompetomp\InertiaBundle\Service\InertiaInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WelcomeController extends AbstractController
{
    public function __construct(
        private readonly LoggerInterface $logger,
        private readonly InertiaInterface $inertia
    ) {
    }

    #[Route('/', name: 'welcome.index')]
    public function index(): Response
    {
        return $this->inertia->render('Welcome');
    }
}
