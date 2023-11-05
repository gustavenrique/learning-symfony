<? declare(strict_types=1);

namespace App\Mapper;

use App\Entity\Actor as ActorEntity;
use App\Entity\Movie as MovieEntity;
use App\DTO\Movie as MovieDTO;

class MovieMapper
{
    public static function EntityToDTO(MovieEntity $movie, bool $getCompleteActors = false): MovieDTO
    {
        $actors = $movie->getActors()->getValues();

        $dtoActors = $getCompleteActors
            ? ActorMapper::EntitiesToDTOs($actors, getMovies: false)
            : array_map(fn(ActorEntity $actor) => $actor->getId(), $actors);

        return new MovieDTO(
            $movie->getId(),
            $movie->getTitle(),
            $movie->getReleaseYear(),
            $movie->getDescription(),
            $movie->getImageUrl(),
            $dtoActors,
        );
    }

    /** @param MovieEntity[] $movies */
    public static function EntitiesToDTOs(array $movies): array
    {
        return array_map(fn(MovieEntity $movie) => self::EntityToDTO($movie), $movies);
    }
}