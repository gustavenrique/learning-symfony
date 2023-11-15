<? declare(strict_types=1);

namespace App\Service\Interface;

use App\DTO\Movie;
use App\DTO\Response\ResponseWrapper;

interface MovieServiceInterface
{
    /** @return ResponseWrapper<Movie[]> */
    public function getAll(): ResponseWrapper;

    public function get(int $id): Movie|null;
}