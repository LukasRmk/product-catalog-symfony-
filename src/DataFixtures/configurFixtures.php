<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\configur;

class configurFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $config = new configur();
        $config->setTaxRate(21);
        $config->setTaxFlag(true);
        $config->setGlobalDiscount(0);
        
        $manager->persist($config);

        $manager->flush();
    }
}
