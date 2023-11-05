<? declare(strict_types=1);

namespace App\DTO;

class Movie
{
    /**
     * @param array<Actor|int> $actors
     */
    public function __construct(
        public readonly int $id,
        public readonly string $title,
        public readonly ?int $releaseYear,
        public readonly ?string $description,
        public readonly ?string $imageUrl,
        public readonly array $actors,
    ) {
    }
}