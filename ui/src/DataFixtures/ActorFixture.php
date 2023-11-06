<? declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\Actor;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ActorFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $evans = Actor::create('Chris Evans', 'https://st3.depositphotos.com/1814084/14938/i/600/depositphotos_149389938-stock-photo-actor-chris-evans.jpg');
        $bale = Actor::create('Christian Bale', 'https://st5.depositphotos.com/70843308/62993/i/450/depositphotos_629932814-stock-photo-english-actor-christian-bale-arrives.jpg');
        $ledger = Actor::create('Heath Ledger', 'https://st.depositphotos.com/1814084/1733/i/600/depositphotos_17332327-stock-photo-heath-ledger.jpg');
        $downeyJr = Actor::create('Robert Downey Jr', 'https://st.depositphotos.com/1814084/1441/i/600/depositphotos_14410229-stock-photo-robert-downey-jr.jpg');

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
