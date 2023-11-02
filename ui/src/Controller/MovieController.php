<? declare(strict_types=1);

namespace App\Controller;

use App\Repository\MovieRepository;
use Psr\Log\LoggerInterface;
use Rompetomp\InertiaBundle\Service\InertiaInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/movie')]
class MovieController extends AbstractController
{
    public function __construct(
        private readonly MovieRepository $movieRepository,
        private readonly LoggerInterface $logger,
        private readonly InertiaInterface $inertia
    ) {
    }

    #[Route('/', name: 'movie.index')]
    public function index(): Response
    {
        $movies = $this->movieRepository->findBy([], ['id' => 'desc']);

        return $this->inertia->render('Movie/Index', ['movies' => $movies]);
    }

    #[Route('/{id}', name: 'movie.show')]
    public function info(int $id): Response
    {
        $movie = $this->movieRepository->find($id);

        return $this->inertia->render('Movie/Show', ['movie' => $movie]);
    }
}
