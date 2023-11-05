<? declare(strict_types=1);

namespace App\Service\Interface;

use App\DTO\Movie;

interface MovieServiceInterface
{
    /** @return Movie[] */
    public function getAll(): array;

    public function get(int $id): Movie|null;
}