<? declare(strict_types=1);

namespace App\Mapper;

use App\DTO\Actor as ActorDTO;
use App\Entity\Actor as ActorEntity;

class ActorMapper
{
    public static function EntityToDTO(ActorEntity $actor, bool $getMovies = true): ActorDTO
    {
        $dto = new ActorDTO($actor->getId(), $actor->getName());

        if ($getMovies)
            $dto->movies = $actor->getMovies()->getValues();

        return $dto;
    }

    /**
     * @param ActorEntity[] $actors
     * @return ActorDTO[]
     */
    public static function EntitiesToDTOs(array $actors, bool $getMovies = true): array
    {
        return array_map(fn(ActorEntity $actor) => self::EntityToDTO($actor, $getMovies), $actors);
    }
}