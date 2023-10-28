<? declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\Actor;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ActorFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $evans = Actor::create('Chris Evans');
        $bale = Actor::create('Christian Bale');
        $ledger = Actor::create('Heath Ledger');
        $downeyJr = Actor::create('Robert Downey Jr');

        $manager->persist($evans);
        $manager->persist($bale);
        $manager->persist($ledger);
        $manager->persist($downeyJr);

        $manager->flush();

        $this->addReference('evans', $evans);
        $this->addReference('bale', $bale);
        $this->addReference('ledger', $ledger);
        $this->addReference('downeyJr', $downeyJr);
    }
}
