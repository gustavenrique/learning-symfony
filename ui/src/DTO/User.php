<? declare(strict_types=1);

namespace App\DTO;

/**
 * @property string[] $roles
 */
class User
{
    public function __construct(
        public readonly ?string $username,
        public readonly ?array $roles = [],
    ) {
    }
}