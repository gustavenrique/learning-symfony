<? declare(strict_types=1);


namespace App\DTO\Response;

class ResponseWrapper
{
    public function __construct(
        public readonly int $status,
        public readonly string $message = '',
        public readonly mixed $data,
    ) {
    }
}