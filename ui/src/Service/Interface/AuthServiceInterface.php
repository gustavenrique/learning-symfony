<? declare(strict_types=1);

namespace App\Service\Interface;

use App\DTO\Request\Register;
use App\DTO\User;

interface AuthServiceInterface
{
    public function register(Register $request): bool;
    public function getCurrentUser(): User;
}