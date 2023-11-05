<? declare(strict_types=1);

namespace App\Service;

use App\DTO\Movie;
use App\Mapper\MovieMapper;
use App\Repository\MovieRepository;
use App\Service\Interface\MovieServiceInterface;
use Psr\Log\LoggerInterface;

class MovieService implements MovieServiceInterface
{
    public function __construct(
        private readonly MovieRepository $repository,
        private readonly LoggerInterface $logger,
    ) {
    }

    public function getAll(): array
    {
        $movies = $this->repository->findBy([], ['id' => 'desc']);

        return MovieMapper::EntitiesToDTOs($movies);
    }

    public function get(int $id): Movie|null
    {
        $movie = $this->repository->find($id);

        return $movie ? MovieMapper::EntityToDTO($movie) : null;
    }
}