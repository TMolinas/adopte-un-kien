<?php

namespace App\DataFixtures;

use App\Entity\Annonce;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $photo1 = new Photo();
        $photo1 ->setNameofDog('labrador');
                ->setImgUrl("https://images.unsplash.com/photo-1599744975877-53aaa14cf55f?ixid=MnwxMjA3fDB8MHxzZWFyY2h8OXx8Y2hpZW58ZW58MHx8MHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60");

        $photo2 = new Photo();
        $photo2 ->setNameofDog('berger suisse');
                ->setImgUrl("https://images.unsplash.com/photo-1577980888576-4ba53bae1c69?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=387&q=80");

        $photo3 = new Photo();
        $photo3 ->setNameofDog('staffy');
                ->setImgUrl("https://images.unsplash.com/photo-1571868094976-6af3b50b43bc?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1170&q=80");

        $photo4 = new Photo();
        $photo4 ->setNameofDog('bull dog français');
                ->setImgUrl("https://images.unsplash.com/photo-1604449641125-26c6187fa48a?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=435&q=80");

        $photo5 = new Photo();
        $photo5 ->setNameofDog('bordeur colee');
                ->setImgUrl("https://images.unsplash.com/photo-1563469514021-a55f4689608f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80");

        $photo6 = new Photo();
        $photo6 ->setNameofDog('berger australien');
                ->setImgUrl("https://images.unsplash.com/photo-1631925834699-74cd2a5ad762?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2070&q=80");


        $photo7 = new Photo();
        $photo7 ->setNameofDog('Pub/carlin');
                ->setImgUrl("https://images.unsplash.com/photo-1565084896092-78e6d1e8cce0?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80");

        $photo8 = new Photo();
        $photo8 ->setNameofDog('chiwawa');
                ->setImgUrl("https://images.unsplash.com/photo-1629213014154-d18aa45e9cb4?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80");

        $photo9 = new Photo();
        $photo9 ->setNameofDog('batard');
                ->setImgUrl("https://images.unsplash.com/photo-1619069109083-b65d7a586d1a?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1174&q=80");

        manager->persist($photo1);
        manager->persist($photo2);
        manager->persist($photo3);
        manager->persist($photo4);
        manager->persist($photo5);
        manager->persist($photo6);
        manager->persist($photo7);
        manager->persist($photo8);
        manager->persist($photo9);

        $dog1 = new Dog();
        $dog1->setNameDog('Chien 1');
             ->setBreed('labrador');
             ->setCanBeAdopted('true');
             ->setPhoto($photo1);
        manager->persist($dog1);

        $dog2->setNameDog('Chien 2');
             ->setBreed('berger suisse');
             ->setCanBeAdopted('true');
             ->setPhoto($photo2);
        manager->persist($dog2);

        $dog3->setNameDog('Chien 3');
             ->setBreed('staffy');
             ->setCanBeAdopted('true');
             ->setPhoto($photo3);
        manager->persist($dog3);

        $dog4->setNameDog('Chien 4');
             ->setBreed('bull dog français');
             ->setCanBeAdopted('true');
             ->setPhoto($photo4);
        manager->persist($dog4);

        $dog5->setNameDog('Chien 5');
             ->setBreed('bordeur colee');
             ->setCanBeAdopted('true');
             ->setPhoto($photo5);
        manager->persist($dog5);

        $dog6->setNameDog('Chien 6');
             ->setBreed('berger australien');
             ->setCanBeAdopted('true');
             ->setPhoto($photo6);
        manager->persist($dog6);

        $dog7->setNameDog('Chien 7');
             ->setBreed('Pub/carlin');
             ->setCanBeAdopted('true');
             ->setPhoto($photo7);
        manager->persist($dog7);

        $dog8->setNameDog('Chien 8');
             ->setBreed('chiwawa');
             ->setCanBeAdopted('true');
             ->setPhoto($photo8);
        manager->persist($dog8);

        $dog9->setNameDog('Chien 9');
             ->setBreed('batard');
             ->setCanBeAdopted('true');
             ->setPhoto($photo9);
        manager->persist($dog9);

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
