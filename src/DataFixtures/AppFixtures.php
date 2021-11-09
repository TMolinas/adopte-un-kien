<?php

namespace App\DataFixtures;

use App\Entity\Admin;
use App\Entity\Adresse;
use App\Entity\Annonce;
use App\Entity\Adoptant;
use App\Entity\Departement;
use App\Entity\Photo;
use App\Entity\EleveurSpa;
use App\Entity\Dog;
use App\Entity\Refuge;
use App\Entity\Ville;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private UserPasswordHasherInterface $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }

    public function load(ObjectManager $manager): void
    {
        $userAdoptant1 = new Adoptant();
        $userAdoptant1->setUserName('userAdoptant1');
        $userAdoptant1->setEmail('userAdoptant1@gmail.com');
        $pwd = $this->hasher->hashPassword($userAdoptant1, 'password');
        $userAdoptant1->setPassword($pwd);
        $userAdoptant1->setNom('user1');
        $userAdoptant1->setTelephone('0251611165');
        $userAdoptant1->setPrenom('adoptant1');

        $manager->persist($userAdoptant1);


        $userAdoptant2 = new Adoptant();
        $userAdoptant2->setUserName('userAdoptant2');
        $userAdoptant2->setEmail('userAdoptant2@gmail.com');
        $pwd = $this->hasher->hashPassword($userAdoptant2, 'password');
        $userAdoptant2->setPassword($pwd);
        $userAdoptant2->setNom('user2');
        $userAdoptant2->setTelephone('0251611165');
        $userAdoptant2->setPrenom('adoptant2');

        $manager->persist($userAdoptant2);

        $userEleveurSpa1 = new EleveurSpa();
        $userEleveurSpa1->setUserName('userEleveurSpa1');
        $userEleveurSpa1->setEmail('userEleveurSpa1@gmail.com');
        $roleEleveur1 = [];
        $roleEleveur1[] = 'ROLE_USER';
        $roleEleveur1[] = 'ROLE_ANNONCEUR';
        $userEleveurSpa1->setRoles($roleEleveur1);
        $userEleveurSpa1->setIsSpa(true);
        $userEleveurSpa1->setTelephone('0251611165');
        $pwd = $this->hasher->hashPassword($userEleveurSpa1, 'password');
        $userEleveurSpa1->setPassword($pwd);
        $userEleveurSpa1->setNameSociety('userEleveurSpa1');
        $userEleveurSpa1->setSiret('241245423432');

        $manager->persist($userEleveurSpa1);

        $userEleveurSpa2 = new EleveurSpa();
        $userEleveurSpa2->setUserName('userEleveurSpa2');
        $userEleveurSpa2->setEmail('userEleveurSpa2@gmail.com');
        $roleEleveur2 = [];
        $roleEleveur2[] = 'ROLE_USER';
        $roleEleveur2[] = 'ROLE_ANNONCEUR';
        $userEleveurSpa2->setRoles($roleEleveur2);
        $userEleveurSpa2->setIsSpa(true);
        $userEleveurSpa2->setTelephone('0251611165');
        $pwd = $this->hasher->hashPassword($userEleveurSpa2, 'password');
        $userEleveurSpa2->setPassword($pwd);
        $userEleveurSpa2->setNameSociety('userEleveurSpa2');
        $userEleveurSpa2->setSiret('241515315');

        $manager->persist($userEleveurSpa2);

        $userEleveurSpa3 = new EleveurSpa();
        $userEleveurSpa3->setUserName('userEleveurSpa3');
        $userEleveurSpa3->setEmail('userEleveurSpa3@gmail.com');
        $roleEleveur3 = [];
        $roleEleveur3[] = 'ROLE_USER';
        $roleEleveur3[] = 'ROLE_ANNONCEUR';
        $userEleveurSpa3->setRoles($roleEleveur1);
        $userEleveurSpa3->setIsSpa(true);
        $userEleveurSpa3->setTelephone('0251611165');
        $pwd = $this->hasher->hashPassword($userEleveurSpa3, 'password');
        $userEleveurSpa3->setPassword($pwd);
        $userEleveurSpa3->setNameSociety('userEleveurSpa3');
        $userEleveurSpa3->setSiret('24152548685');

        $manager->persist($userEleveurSpa3);


        //Photos fixtures
        $photo1 = new Photo();
        $photo1->setNameofDog('labrador');
        $photo1->setImgUrl('https://images.unsplash.com/photo-1599744975877-53aaa14cf55f?ixid=MnwxMjA3fDB8MHxzZWFyY2h8OXx8Y2hpZW58ZW58MHx8MHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60');

        $photo2 = new Photo();
        $photo2->setNameofDog('berger suisse');
        $photo2->setImgUrl("https://images.unsplash.com/photo-1577980888576-4ba53bae1c69?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=387&q=80");

        $photo3 = new Photo();
        $photo3->setNameofDog('staffy');
        $photo3->setImgUrl("https://images.unsplash.com/photo-1571868094976-6af3b50b43bc?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1170&q=80");

        $photo4 = new Photo();
        $photo4->setNameofDog('bull dog français');
        $photo4->setImgUrl("https://images.unsplash.com/photo-1604449641125-26c6187fa48a?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=435&q=80");

        $photo5 = new Photo();
        $photo5->setNameofDog('bordeur colee');
        $photo5->setImgUrl("https://images.unsplash.com/photo-1563469514021-a55f4689608f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80");

        $photo6 = new Photo();
        $photo6->setNameofDog('berger australien');
        $photo6->setImgUrl("https://images.unsplash.com/photo-1631925834699-74cd2a5ad762?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2070&q=80");


        $photo7 = new Photo();
        $photo7->setNameofDog('Pub/carlin');
        $photo7->setImgUrl("https://images.unsplash.com/photo-1565084896092-78e6d1e8cce0?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80");

        $photo8 = new Photo();
        $photo8->setNameofDog('chiwawa');
        $photo8->setImgUrl("https://images.unsplash.com/photo-1629213014154-d18aa45e9cb4?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80");

        $photo9 = new Photo();
        $photo9->setNameofDog('batard');
        $photo9->setImgUrl("https://images.unsplash.com/photo-1619069109083-b65d7a586d1a?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1174&q=80");

        $manager->persist($photo1);
        $manager->persist($photo2);
        $manager->persist($photo3);
        $manager->persist($photo4);
        $manager->persist($photo5);
        $manager->persist($photo6);
        $manager->persist($photo7);
        $manager->persist($photo8);
        $manager->persist($photo9);

        // Dog fixtures
        $dog1 = new Dog();
        $dog1->setNameOfDog('Chien 1');
        $dog1->setBreed('labrador');
        $dog1->setCanBeAdopted(true);
        $dog1->addPhoto($photo1);
        $manager->persist($dog1);

        $dog2 = new Dog();
        $dog2->setNameOfDog('Chien 2');
        $dog2->setBreed('berger suisse');
        $dog2->setCanBeAdopted(true);
        $dog2->addPhoto($photo2);
        $manager->persist($dog2);

        $dog3 = new Dog();
        $dog3->setNameOfDog('Chien 3');
        $dog3->setBreed('staffy');
        $dog3->setCanBeAdopted(true);
        $dog3->addPhoto($photo3);
        $manager->persist($dog3);

        $dog4 = new Dog();
        $dog4->setNameOfDog('Chien 4');
        $dog4->setBreed('bull dog français');
        $dog4->setCanBeAdopted(true);
        $dog4->addPhoto($photo4);
        $manager->persist($dog4);

        $dog5 = new Dog();
        $dog5->setNameOfDog('Chien 5');
        $dog5->setBreed('bordeur colee');
        $dog5->setCanBeAdopted(true);
        $dog5->addPhoto($photo5);
        $manager->persist($dog5);

        $dog6 = new Dog();
        $dog6->setNameOfDog('Chien 6');
        $dog6->setBreed('berger australien');
        $dog6->setCanBeAdopted(true);
        $dog6->addPhoto($photo6);
        $manager->persist($dog6);

        $dog7 = new Dog();
        $dog7->setNameOfDog('Chien 7');
        $dog7->setBreed('Pub/carlin');
        $dog7->setCanBeAdopted(true);
        $dog7->addPhoto($photo7);
        $manager->persist($dog7);

        $dog8 = new Dog();
        $dog8->setNameOfDog('Chien 8');
        $dog8->setBreed('chiwawa');
        $dog8->setCanBeAdopted(true);
        $dog8->addPhoto($photo8);
        $manager->persist($dog8);

        $dog9 = new Dog();
        $dog9->setNameOfDog('Chien 9');
        $dog9->setBreed('batard');
        $dog9->setCanBeAdopted(true);
        $dog9->addPhoto($photo9);
        $manager->persist($dog9);

        // Annonces fixtures
        $annonce1 = new Annonce();
        $annonce1->setTitre('Annonce 2 chiens');
        $annonce1->setDate(new \Datetime());
        $annonce1->addDog($dog1);
        $annonce1->addDog($dog2);
        $annonce1->setEleveurSpa($userEleveurSpa1);
        $manager->persist($annonce1);

        $annonce2 = new Annonce();
        $annonce2->setTitre('Annonce n°2');
        $annonce2->setDate(new \Datetime());
        $annonce2->addDog($dog3);
        $annonce2->setEleveurSpa($userEleveurSpa2);
        $manager->persist($annonce2);

        $annonce3 = new Annonce();
        $annonce3->setTitre('Annonce n°3');
        $annonce3->setDate(new \Datetime());
        $annonce3->addDog($dog4);
        $annonce3->setEleveurSpa($userEleveurSpa3);
        $manager->persist($annonce3);

        $annonce4 = new Annonce();
        $annonce4->setTitre('Annonce n°4');
        $annonce4->setDate(new \Datetime());
        $annonce4->addDog($dog5);
        $annonce4->setEleveurSpa($userEleveurSpa1);
        $manager->persist($annonce4);

        $annonce5 = new Annonce();
        $annonce5->setTitre('Annonce n°5');
        $annonce5->setDate(new \Datetime());
        $annonce5->addDog($dog6);
        $annonce5->setEleveurSpa($userEleveurSpa2);
        $manager->persist($annonce5);

        $annonce6 = new Annonce();
        $annonce6->setTitre('Annonce n°6');
        $annonce6->setDate(new \Datetime());
        $annonce6->addDog($dog7);
        $annonce6->setEleveurSpa($userEleveurSpa1);
        $manager->persist($annonce6);

        $annonce7 = new Annonce();
        $annonce7->setTitre('Annonce n°7 2 chiens');
        $annonce7->setDate(new \Datetime());
        $annonce7->addDog($dog8);
        $annonce7->addDog($dog9);
        $annonce7->setEleveurSpa($userEleveurSpa3);
        $manager->persist($annonce7);

        $ville1= new Ville();
        $ville1->setCityName('paris');
        $manager->persist($ville1);

        $ville2= new Ville();
        $ville2->setCityName('bordeaux');
        $manager->persist($ville2);

        $ville3= new Ville();
        $ville3->setCityName('marseille-BB');
        $manager->persist($ville3);

        $ville4= new Ville();
        $ville4->setCityName('vichy');
        $manager->persist($ville4);

        $ville5= new Ville();
        $ville5->setCityName('Anus');
        $manager->persist($ville5);


        $ville5= new Ville();
        $ville5->setCityName('Rennes');
        $manager->persist($ville5);

        $ville6= new Ville();
        $ville6->setCityName('Lyon');
        $manager->persist($ville6);

        $ville7= new Ville();
        $ville7->setCityName('Lille');
        $manager->persist($ville7);

        $ville8= new Ville();
        $ville8->setCityName('Amsterdam');
        $manager->persist($ville8);

        $admin = new Admin();
        $admin->setEmail('admin@admin.admin');
        $admin->setUserName('admin');
        $pwd = $this->hasher->hashPassword($admin, 'admin');
        $admin->setPassword($pwd);
        $admin->setTelephone('0000000000');
        $adresse = new Adresse();
        $adresse->setNameOfStreet('rue de Boleman');
        $adresse->setNumberInStreet('10');
        $adresse->setVille($ville1);
        $admin->setAdresse($adresse);

        $manager->persist($adresse);
        $manager->persist($admin);

        $manager->flush();








        // $product = new Product();
        // $manager->persist($product);
    }
}
