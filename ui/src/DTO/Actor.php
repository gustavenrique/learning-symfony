<? declare(strict_types=1);

namespace App\DTO;

/**
 * @property Movie[] $movies
 */
class Actor
{
    public function __construct(
        public int $id,
        public string $name,
        public array $movies = [],
    ) {
    }
}