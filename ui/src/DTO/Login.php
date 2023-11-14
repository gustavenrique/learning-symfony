<? declare(strict_types=1);

namespace App\DTO;

use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

class Login
{
    public function __construct(
    #[Assert\NotBlank]
    #[Assert\Length(min: 2, max: 40)]
        public readonly string $username,

    #[Assert\NotBlank]
    #[Assert\Length(min: 4, max: 150)]
        public readonly string $password,

    #[SerializedName("_csrf_token")]
        public readonly string $csrfToken,
    ) {
    }
}