<? declare(strict_types=1);

namespace App\Controller;

use App\Repository\MovieRepository;
use App\Service\Interface\MovieServiceInterface;
use Psr\Log\LoggerInterface;
use Rompetomp\InertiaBundle\Service\InertiaInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/movie')]
class MovieController extends AbstractController
{
    public function __construct(
        private readonly MovieServiceInterface $service,
        private readonly LoggerInterface $logger,
        private readonly InertiaInterface $inertia
    ) {
    }

    #[Route('/', name: 'movie.index')]
    public function index(): Response
    {
        $movies = $this->service->getAll();

        return $this->inertia->render('Movie/Index', ['movies' => $movies]);
    }

    #[Route('/{id}', name: 'movie.show')]
    public function info(int $id): Response
    {
        $movie = $this->service->get($id);

        return $this->inertia->render('Movie/Show', ['movie' => $movie]);
    }
}
