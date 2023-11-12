<? declare(strict_types=1);

namespace App\Service\Interface;

use App\DTO\Register;

interface AuthServiceInterface
{
    public function register(Register $request): bool;
}