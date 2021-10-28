<?php

namespace App\DataFixtures;

use App\Entity\Annonce;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        for ($i = 1; $i <= 10; $i++) {
            $dog = new Dog();

        }
        // $product = new Product();
        // $manager->persist($product);
        for ($i = 1; $i <= 10; $i++) {
            $annonce = new Annonce();
            $annonce->setTitre('Titre n°$i');

        }

        $manager->flush();
    }
}
