<? declare(strict_types=1);

namespace App\DTO\Request;

use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

class Register
{
    public function __construct(
    #[Assert\NotBlank]
    #[Assert\Length(min: 2, max: 40)]
        public readonly string $username,

    #[Assert\NotBlank]
    #[Assert\Length(min: 10, max: 150)]
    #[Assert\Email]
        public readonly string $email,

    #[Assert\NotBlank]
    #[Assert\Length(min: 4, max: 150)]
        public readonly string $password,

    #[Assert\IsTrue]
    #[SerializedName('agreed')]
        public readonly bool $agreeWithUseTerms
    ) {
    }
}