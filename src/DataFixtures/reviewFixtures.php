<?php

namespace App\DataFixtures;

use App\Entity\review;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class reviewFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $review = new review();
        $review->setProductId(1);
        $review->setText('Labai geras, rankai patogus telefonas. Puikiai išpildė mano lūkesčius, ypač ryškus ekranas, SAMSUNG šį kart nenuvylė!');
        $review->setRate(5);
        
        $manager->persist($review);

        $review1 = new review();
        $review1->setProductId(1);
        $review1->setText('Tikėjausi geresnio, gaila neina grąžinti...');
        $review1->setRate(1);
        
        $manager->persist($review1);

        $review2 = new review();
        $review2->setProductId(2);
        $review2->setText('Nenuvylė');
        $review2->setRate(4);
        
        $manager->persist($review2);

        $review3 = new review();
        $review3->setProductId(2);
        $review3->setText('Na, kitur galima nusipirkti už pigiau');
        $review3->setRate(3);
        
        $manager->persist($review3);

        $review4 = new review();
        $review4->setProductId(3);
        $review4->setText('Džiaugiuosi įsigijęs, gera kaina :)');
        $review4->setRate(5);
        
        $manager->persist($review4);

        $review5 = new review();
        $review5->setProductId(4);
        $review5->setText('Senas, bet geras, nupirkau dukrai, liko patenkinta');
        $review5->setRate(5);
        
        $manager->persist($review5);

        $review6 = new review();
        $review6->setProductId(3);
        $review6->setText('Oho, tikrai geras telefonas, tik gaila, kad nusipirkau prieš akciją :((');
        $review6->setRate(4);
        
        $manager->persist($review6);

        $manager->flush();
    }
}
