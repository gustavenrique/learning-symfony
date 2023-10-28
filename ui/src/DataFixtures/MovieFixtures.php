<? declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\Movie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Persistence\ObjectManager;

class MovieFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $avengers = Movie::create(
            'Avengers: End Game',
            2019,
            'An awesome movie!',
            'https://cdn.pixabay.com/photo/2020/10/28/10/02/captain-america-5692937_1280.jpg',
            new ArrayCollection([
                $this->getReference('ledger'),
                $this->getReference('bale')
            ])
        );

        $batman = Movie::create(
            'The Dark Knight',
            2008,
            'A dark movie...',
            'https://cdn.pixabay.com/photo/2021/06/18/11/22/batman-6345897_960_720.jpg',
            new ArrayCollection([
                $this->getReference('evans'),
                $this->getReference('downeyJr')
            ])
        );

        $manager->persist($batman);
        $manager->persist($avengers);

        $manager->flush();
    }
}
