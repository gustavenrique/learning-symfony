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

    #[Route('/', name: 'Movies')]
    public function index(): Response
    {
        $movies = $this->movieRepository->findBy([], ['id' => 'desc']);

        // dd($movies);

        // return $this->render('movie/index.twig', ['movies' => $movies]);
        return $this->inertia->render('Welcome', ['movies' => $movies]);
    }

    #[Route('/{id}', name: 'Movie')]
    public function movie(int $id): Response
    {
        $movie = $this->movieRepository->find($id);

        // dd($movie);

        return $this->render('movie/movie.twig', ['movie' => $movie]);
    }
}
