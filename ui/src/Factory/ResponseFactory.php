<? declare(strict_types=1);

namespace App\Factory;

use App\DTO\Response\ResponseWrapper;
use Symfony\Component\HttpFoundation\Response;

class ResponseFactory
{
    public static function Ok(mixed $data, ?string $message = '')
    {
        return new ResponseWrapper(Response::HTTP_OK, $message, $data);
    }

    public static function NoContent()
    {
        return new ResponseWrapper(Response::HTTP_NO_CONTENT, '', null);
    }

    public static function BadRequest(mixed $data, ?string $message = '')
    {
        return new ResponseWrapper(Response::HTTP_BAD_REQUEST, $message, $data);
    }
}