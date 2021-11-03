<?php

namespace App\DataFixtures;

use App\Entity\Admin;
use App\Entity\Adresse;
use App\Entity\Annonce;
use App\Entity\Adoptant;
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
        $userEleveurSpa1->setIsSpa('true');
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
        $userEleveurSpa2->setIsSpa('true');
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
        $userEleveurSpa3->setIsSpa('true');
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
        $dog1->setCanBeAdopted('true');
        $dog1->addPhoto($photo1);
        $manager->persist($dog1);

        $dog2 = new Dog();
        $dog2->setNameOfDog('Chien 2');
        $dog2->setBreed('berger suisse');
        $dog2->setCanBeAdopted('true');
        $dog2->addPhoto($photo2);
        $manager->persist($dog2);

        $dog3 = new Dog();
        $dog3->setNameOfDog('Chien 3');
        $dog3->setBreed('staffy');
        $dog3->setCanBeAdopted('true');
        $dog3->addPhoto($photo3);
        $manager->persist($dog3);

        $dog4 = new Dog();
        $dog4->setNameOfDog('Chien 4');
        $dog4->setBreed('bull dog français');
        $dog4->setCanBeAdopted('true');
        $dog4->addPhoto($photo4);
        $manager->persist($dog4);

        $dog5 = new Dog();
        $dog5->setNameOfDog('Chien 5');
        $dog5->setBreed('bordeur colee');
        $dog5->setCanBeAdopted('true');
        $dog5->addPhoto($photo5);
        $manager->persist($dog5);

        $dog6 = new Dog();
        $dog6->setNameOfDog('Chien 6');
        $dog6->setBreed('berger australien');
        $dog6->setCanBeAdopted('true');
        $dog6->addPhoto($photo6);
        $manager->persist($dog6);

        $dog7 = new Dog();
        $dog7->setNameOfDog('Chien 7');
        $dog7->setBreed('Pub/carlin');
        $dog7->setCanBeAdopted('true');
        $dog7->addPhoto($photo7);
        $manager->persist($dog7);

        $dog8 = new Dog();
        $dog8->setNameOfDog('Chien 8');
        $dog8->setBreed('chiwawa');
        $dog8->setCanBeAdopted('true');
        $dog8->addPhoto($photo8);
        $manager->persist($dog8);

        $dog9 = new Dog();
        $dog9->setNameOfDog('Chien 9');
        $dog9->setBreed('batard');
        $dog9->setCanBeAdopted('true');
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
        $ville3->setCityName('marseillBB');
        $manager->persist($ville3);

        $ville4= new Ville();
        $ville4->setCityName('vichy');
        $manager->persist($ville4);

        $ville5= new Ville();
        $ville5->setCityName('Llanfairpwllgwyngyllgogerychwyrndrobwllllantysiliogogogoch');
        $manager->persist($ville5);


        $ville5= new Ville();
        $ville5->setCityName('renne');
        $manager->persist($ville5);

        $ville6= new Ville();
        $ville6->setCityName('obiwankenobecity');
        $manager->persist($ville6);

        $ville7= new Ville();
        $ville7->setCityName('moncul');
        $manager->persist($ville7);



        $admin = new Admin();
        $admin->setEmail('admin@admin.admin');
        $admin->setUserName('admin');
        $pwd = $this->hasher->hashPassword($admin, 'admin');
        $admin->setPassword($pwd);
        $admin->setTelephone('0000000000');
        $adresse = new Adresse();
        $adresse->setNameOf7Street('Bouh');
        $adresse->setNuberInStreet('10');
        $adresse->setVille($ville1);
        $admin->setAdresse($adresse);

        $manager->persist($adresse);
        $manager->persist($admin);

//     $refuge1= new Refuge();
//     $refuge1->addRefugeName('Refuge des Prés de Longuevalle - Laond');
//     $refuge1->addDepartementRefuge('02');
//     $refuge1->addPhotoRefuge("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRJI27YhHDkEZRAG7kIFI0ZK7cNubJ1c5eefw&usqp=CAU");
//     $manager->persist($refuge1);
//
//     $refuge2= new Refuge();
//     $refuge2->addRefugeName('Refuge de Brugheasd');
//     $refuge2->addDepartementRefuge('03');
//     $refuge2->addPhotoRefuge("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpOwAMfwsbaKJnSMd--sFJemUeBGY2gWLu5Q&usqp=CAU");
//     $manager->persist($refuge2);
//
//     $refuge3= new Refuge();
//     $refuge3->addRefugeName('Refuge La Loue - Montluçond');
//     $refuge3->addDepartementRefuge('03');
//     $refuge3->addPhotoRefuge("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRJI27YhHDkEZRAG7kIFI0ZK7cNubJ1c5eefw&usqp=CAU");
//     $manager->persist($refuge3);
//
//     $refuge4= new Refuge();
//     $refuge4->addRefugeName('Refuge SPA Briançon - Le Chazald');
//     $refuge4->addDepartementRefuge('05');
//     $refuge4->addPhotoRefuge("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRJI27YhHDkEZRAG7kIFI0ZK7cNubJ1c5eefw&usqp=CAU");
//     $manager->persist($refuge4);
//
//     $refuge5= new Refuge();
//     $refuge5->addRefugeName('Refuge de Clirond');
//     $refuge5->addDepartementRefuge("08");
//     $refuge5->addPhotoRefuge("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpOwAMfwsbaKJnSMd--sFJemUeBGY2gWLu5Q&usqp=CAU");
//     $manager->persist($refuge5);
//
//     $refuge6= new Refuge();
//     $refuge6->addRefugeName('Refuge Le Clergue - Mirepoixd');
//     $refuge6->addDepartementRefuge("09");
//     $refuge6->addPhotoRefuge("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpOwAMfwsbaKJnSMd--sFJemUeBGY2gWLu5Q&usqp=CAU");
//     $manager->persist($refuge6);
//
//     $refuge7= new Refuge();
//     $refuge7->addRefugeName('Refuge de Menois - St Parres Aux Tertresd');
//     $refuge7->addDepartementRefuge("10");
//     $refuge7->addPhotoRefuge("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQStDAqRerQjxYCYnGKpPCt4pnpuJ5JZdtgWw&usqp=CAU");
//     $manager->persist($refuge7);
//
//     $refuge8= new Refuge();
//     $refuge8->addRefugeName('Refuge de Port la Nouvelled');
//     $refuge8->addDepartementRefuge("11");
//     $refuge8->addPhotoRefuge("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQStDAqRerQjxYCYnGKpPCt4pnpuJ5JZdtgWw&usqp=CAU");
//     $manager->persist($refuge8);
//
//     $refuge9= new Refuge();
//     $refuge9->addRefugeName('Refuge de Millaud');
//     $refuge9->addDepartementRefuge("12");
//     $refuge9->addPhotoRefuge("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpOwAMfwsbaKJnSMd--sFJemUeBGY2gWLu5Q&usqp=CAU");
//     $manager->persist($refuge9);
//
//     $refuge10= new Refuge();
//     $refuge10->addRefugeName('Refuge des Chiens en Liberté-Aix en Provenced');
//     $refuge10->addDepartementRefuge("13");
//     $refuge10->addPhotoRefuge("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpOwAMfwsbaKJnSMd--sFJemUeBGY2gWLu5Q&usqp=CAU");
//     $manager->persist($refuge10);
//
//     $refuge11= new Refuge();
//     $refuge11->addRefugeName( 'Refuge de Cabourgd');
//     $refuge11->addDepartementRefuge("14");
//     $refuge11->addPhotoRefuge("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQStDAqRerQjxYCYnGKpPCt4pnpuJ5JZdtgWw&usqp=CAU");
//     $manager->persist($refuge11);
//
//     $refuge12= new Refuge();
//     $refuge12->addRefugeName('Refuge La Rochette - Chameyratd');
//     $refuge12->addDepartementRefuge("19");
//     $refuge12->addPhotoRefuge("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRJI27YhHDkEZRAG7kIFI0ZK7cNubJ1c5eefw&usqp=CAU");
//     $manager->persist($refuge12);
//
//     $refuge13= new Refuge();
//     $refuge13->addRefugeName('Refuge de Crozond');
//     $refuge13->addDepartementRefuge("29");
//     $refuge13->addPhotoRefuge("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpOwAMfwsbaKJnSMd--sFJemUeBGY2gWLu5Q&usqp=CAU");
//     $manager->persist($refuge13);
//
//     $refuge14= new Refuge();
//     $refuge14->addRefugeName('Refuge de Plouhinecd');
//     $refuge14->addDepartementRefuge("29");
//     $refuge14->addPhotoRefuge("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpOwAMfwsbaKJnSMd--sFJemUeBGY2gWLu5Q&usqp=CAU");
//     $manager->persist($refuge14);
//
//     $refuge15= new Refuge();
//     $refuge15->addRefugeName('Refuge du Corniguel - Quimperd');
//     $refuge15->addDepartementRefuge("29");
//     $refuge15->addPhotoRefuge("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRJI27YhHDkEZRAG7kIFI0ZK7cNubJ1c5eefw&usqp=CAU");
//     $manager->persist($refuge15);
//
//     $refuge16= new Refuge();
//     $refuge16->addRefugeName('Refuge Les Garrigues - Vallérarguesd');
//     $refuge16->addDepartementRefuge("30");
//     $refuge16->addPhotoRefuge("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpOwAMfwsbaKJnSMd--sFJemUeBGY2gWLu5Q&usqp=CAU");
//     $manager->persist($refuge16);
//        ;
//     $refuge17= new Refuge();
//     $refuge17->addRefugeName('Refuge de Châteaubourgd');
//     $refuge17->addDepartementRefuge("35");
//     $refuge17->addPhotoRefuge("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpOwAMfwsbaKJnSMd--sFJemUeBGY2gWLu5Q&usqp=CAU");
//     $manager->persist($refuge17);
//        ;
//     $refuge18= new Refuge();
//     $refuge18->addRefugeName('Refuge de Rennesd');
//     $refuge18->addDepartementRefuge("35");
//     $refuge18->addPhotoRefuge("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQStDAqRerQjxYCYnGKpPCt4pnpuJ5JZdtgWw&usqp=CAU");
//     $manager->persist($refuge18);
//
//     $refuge19= new Refuge();
//     $refuge19->addRefugeName('Refuge La Verdière - Sainte Marie de Redond');
//     $refuge19->addDepartementRefuge("35");
//     $refuge19->addPhotoRefuge("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpOwAMfwsbaKJnSMd--sFJemUeBGY2gWLu5Q&usqp=CAU");
//     $manager->persist($refuge19);
//
//     $refuge20= new Refuge();
//     $refuge20->addRefugeName('Refuge Le Bois Pinson - Vitréd');
//     $refuge20->addDepartementRefuge("35");
//     $refuge20->addPhotoRefuge("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpOwAMfwsbaKJnSMd--sFJemUeBGY2gWLu5Q&usqp=CAU");
//     $manager->persist($refuge20);
//        ;
//     $refuge21= new Refuge();
//     $refuge21->addRefugeName('Refuge de Luynesd');
//     $refuge21->addDepartementRefuge("37");
//     $refuge21->addPhotoRefuge("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRJI27YhHDkEZRAG7kIFI0ZK7cNubJ1c5eefw&usqp=CAU");
//     $manager->persist($refuge21);
//
//     $refuge22= new Refuge("40");
//     $refuge22->addRefugeName('Refuge de Saint Pierre du Montd');
//     $refuge22->addDepartementRefuge("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRJI27YhHDkEZRAG7kIFI0ZK7cNubJ1c5eefw&usqp=CAU");
//     $refuge22->addPhotoRefuge("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpOwAMfwsbaKJnSMd--sFJemUeBGY2gWLu5Q&usqp=CAU");
//     $manager->persist($refuge22);
//
//     $refuge23= new Refuge();
//     $refuge23->addRefugeName('Refuge Jean Leriche - Moréed');
//     $refuge23->addDepartementRefuge("41");
//     $refuge23->addPhotoRefuge("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpOwAMfwsbaKJnSMd--sFJemUeBGY2gWLu5Q&usqp=CAU");
//     $manager->persist($refuge23);
//
//     $refuge24= new Refuge();
//     $refuge24->addRefugeName( 'Refuge Pornic-Saint Père - Clion sur Merd');
//     $refuge24->addDepartementRefuge("44");
//     $refuge24->addPhotoRefuge("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRJI27YhHDkEZRAG7kIFI0ZK7cNubJ1c5eefw&usqp=CAU");
//     $manager->persist($refuge24);
//
//     $refuge25= new Refuge();
//     $refuge25->addRefugeName("Refuge Le Moulin d'en Haut - Chilleurs aux Boisd");
//     $refuge25->addDepartementRefuge("45");
//     $refuge25->addPhotoRefuge("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpOwAMfwsbaKJnSMd--sFJemUeBGY2gWLu5Q&usqp=CAU");
//     $manager->persist($refuge25);
//
//     $refuge26= new Refuge();
//     $refuge26->addRefugeName(" Refuge de l'Espérance - Choletd");
//     $refuge26->addDepartementRefuge("49");
//     $refuge26->addPhotoRefuge("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpOwAMfwsbaKJnSMd--sFJemUeBGY2gWLu5Q&usqp=CAU");
//     $manager->persist($refuge26);
//
//     $refuge27= new Refuge();
//     $refuge27->addRefugeName("Refuge du Cotentind");
//     $refuge27->addDepartementRefuge("50");
//     $refuge27->addPhotoRefuge("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQStDAqRerQjxYCYnGKpPCt4pnpuJ5JZdtgWw&usqp=CAU");
//     $manager->persist($refuge27);
//
//     $refuge28= new Refuge();
//     $refuge28->addRefugeName("Refuge d'Inzinzacd");
//     $refuge28->addDepartementRefuge("56");
//     $refuge28->addPhotoRefuge("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRJI27YhHDkEZRAG7kIFI0ZK7cNubJ1c5eefw&usqp=CAU");
//     $manager->persist($refuge28);
//
//     $refuge29= new Refuge();
//     $refuge29->addRefugeName('Refuge de Forbachd');
//     $refuge29->addDepartementRefuge("57");
//     $refuge29->addPhotoRefuge("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRJI27YhHDkEZRAG7kIFI0ZK7cNubJ1c5eefw&usqp=CAU");
//     $manager->persist($refuge29);
//
//     $refuge30= new Refuge();
//     $refuge30->addRefugeName('Refuge de Sarregueminesd');
//     $refuge30->addDepartementRefuge("57");
//     $refuge30->addPhotoRefuge("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpOwAMfwsbaKJnSMd--sFJemUeBGY2gWLu5Q&usqp=CAU");
//     $manager->persist($refuge30);
//
//     $refuge31= new Refuge();
//     $refuge31->addRefugeName("Refuge de Thionvilled");
//     $refuge31->addDepartementRefuge("57");
//     $refuge31->addPhotoRefuge("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpOwAMfwsbaKJnSMd--sFJemUeBGY2gWLu5Q&usqp=CAU");
//     $manager->persist($refuge31);
//
//     $refuge32= new Refuge();
//     $refuge32->addRefugeName('Refuge Gerhard Cramer - Arryd');
//     $refuge32->addDepartementRefuge("57");
//     $refuge32->addPhotoRefuge("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRJI27YhHDkEZRAG7kIFI0ZK7cNubJ1c5eefw&usqp=CAU");
//     $manager->persist($refuge32);
//
//     $refuge33= new Refuge();
//     $refuge33->addRefugeName('Refuge de Compiègned');
//     $refuge33->addDepartementRefuge("60");
//     $refuge33->addPhotoRefuge("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRJI27YhHDkEZRAG7kIFI0ZK7cNubJ1c5eefw&usqp=CAU");
//     $manager->persist($refuge33);
//
//     $refuge34= new Refuge();
//     $refuge34->addRefugeName('Grand Refuge SPA');
//     $refuge34->addDepartementRefuge("61");
//     $refuge34->addPhotoRefuge("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQStDAqRerQjxYCYnGKpPCt4pnpuJ5JZdtgWw&usqp=CAU");
//     $manager->persist($refuge34);
//
//     $refuge35= new Refuge();
//     $refuge35->addRefugeName('Refuge de Tilloy les Mofflainesd');
//     $refuge35->addDepartementRefuge("62");
//     $refuge35->addPhotoRefuge("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpOwAMfwsbaKJnSMd--sFJemUeBGY2gWLu5Q&usqp=CAU");
//     $manager->persist($refuge35);
//
//     $refuge36= new Refuge();
//     $refuge36->addRefugeName('Refuge Le Brockus - Saint Omerd');
//     $refuge36->addDepartementRefuge("62");
//     $refuge36->addPhotoRefuge("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpOwAMfwsbaKJnSMd--sFJemUeBGY2gWLu5Q&usqp=CAU");
//     $manager->persist($refuge36);
//
//     $refuge37= new Refuge();
//     $refuge37->addRefugeName('Refuge CAP de Perpignand');
//     $refuge37->addDepartementRefuge("66");
//     $refuge37->addPhotoRefuge("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQStDAqRerQjxYCYnGKpPCt4pnpuJ5JZdtgWw&usqp=CAU");
//     $manager->persist($refuge37);
//
//     $refuge38= new Refuge();
//     $refuge38->addRefugeName('Refuge Le Jardin de la Padrine - Torreillesd');
//     $refuge38->addDepartementRefuge("66");
//     $refuge38->addPhotoRefuge("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRJI27YhHDkEZRAG7kIFI0ZK7cNubJ1c5eefw&usqp=CAU");
//     $manager->persist($refuge38);
//
//     $refuge39= new Refuge();
//     $refuge39->addRefugeName('Refuge de Lyon-Marennesd');
//     $refuge39->addDepartementRefuge("66");
//     $refuge39->addPhotoRefuge("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpOwAMfwsbaKJnSMd--sFJemUeBGY2gWLu5Q&usqp=CAU");
//     $manager->persist($refuge39);
//
//     $refuge40= new Refuge();
//     $refuge40->addRefugeName("Refuge La Ferme des Arches - Yvré L'évêqued");
//     $refuge39->addDepartementRefuge("72");
//     $refuge39->addPhotoRefuge("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRJI27YhHDkEZRAG7kIFI0ZK7cNubJ1c5eefw&usqp=CAU");
//     $manager->persist($refuge40);
//
//     $refuge41= new Refuge();
//     $refuge41->addRefugeName('Refuge de la Vallée Blanche - Clusesd');
//     $refuge41->addDepartementRefuge("74");
//     $refuge41->addPhotoRefuge("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQStDAqRerQjxYCYnGKpPCt4pnpuJ5JZdtgWw&usqp=CAU");
//     $manager->persist($refuge41);
//
//     $refuge42= new Refuge();
//     $refuge42->addRefugeName("Refuge d'Etalondesd");
//     $refuge42->addDepartementRefuge("76");
//     $refuge42->addPhotoRefuge("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQStDAqRerQjxYCYnGKpPCt4pnpuJ5JZdtgWw&usqp=CAU");
//     $manager->persist($refuge42);
//
//     $refuge43= new Refuge();
//     $refuge43->addRefugeName( 'Refuge de Vaux Le Pénild');
//     $refuge43->addDepartementRefuge("77");
//     $refuge43->addPhotoRefuge("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpOwAMfwsbaKJnSMd--sFJemUeBGY2gWLu5Q&usqp=CAU");
//     $manager->persist($refuge43);
//
//     $refuge44= new Refuge();
//     $refuge44->addRefugeName("Refuge d'Hermerayd");
//     $refuge44->addDepartementRefuge("78");
//     $refuge44->addPhotoRefuge("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQYFivrs2NIFYGW7wcYLQYFT-0jdb0ES0T3_A&usqp=CAU");
//     $manager->persist($refuge44);
//
//     $refuge45= new Refuge();
//     $refuge45->addRefugeName("Refuge d'Orgevald");
//     $refuge45->addDepartementRefuge("78");
//     $refuge45->addPhotoRefuge("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQStDAqRerQjxYCYnGKpPCt4pnpuJ5JZdtgWw&usqp=CAU");
//     $manager->persist($refuge45);
//
//     $refuge46= new Refuge();
//     $refuge46->addRefugeName("Refuge de Plaisird");
//     $refuge46->addDepartementRefuge("78");
//     $refuge46->addPhotoRefuge("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpOwAMfwsbaKJnSMd--sFJemUeBGY2gWLu5Q&usqp=CAU");
//     $manager->persist($refuge46);
//
//     $refuge47= new Refuge();
//     $refuge47->addRefugeName("Refuge de Poulainvilled");
//     $refuge47->addDepartementRefuge("80");
//     $refuge47->addPhotoRefuge("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpOwAMfwsbaKJnSMd--sFJemUeBGY2gWLu5Q&usqp=CAU");
//     $manager->persist($refuge47);
//
//     $refuge48= new Refuge();
//     $refuge48->addRefugeName('Refuge Puech de Barret - Le Garricd');
//     $refuge48->addDepartementRefuge("81");
//     $refuge48->addPhotoRefuge("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRJI27YhHDkEZRAG7kIFI0ZK7cNubJ1c5eefw&usqp=CAU");
//     $manager->persist($refuge48);
//
//     $refuge49= new Refuge();
//     $refuge49->addRefugeName('Refuge des Deux Rives - Golfech');
//     $refuge49->addDepartementRefuge("82");
//     $refuge49->addPhotoRefuge("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQStDAqRerQjxYCYnGKpPCt4pnpuJ5JZdtgWw&usqp=CAU");
//     $manager->persist($refuge49);
//
//     $refuge50= new Refuge();
//     $refuge50->addRefugeName('Refuge  La Ferme du Relais- Flayosc');
//     $refuge50->addDepartementRefuge("83");
//     $refuge50->addPhotoRefuge("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQStDAqRerQjxYCYnGKpPCt4pnpuJ5JZdtgWw&usqp=CAU");
//     $manager->persist($refuge50);
//
//     $refuge51= new Refuge();
//     $refuge51->addRefugeName('Refuge de La Roche sur Yon');
//     $refuge51->addDepartementRefuge("85");
//     $refuge51->addPhotoRefuge("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpOwAMfwsbaKJnSMd--sFJemUeBGY2gWLu5Q&usqp=CAU");
//     $manager->persist($refuge51);
//
//     $refuge52= new Refuge();
//     $refuge52->addRefugeName( 'Refuge Les Petites Prises - Château d Olonne');
//     $refuge52->addDepartementRefuge("85");
//     $refuge52->addPhotoRefuge("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRJI27YhHDkEZRAG7kIFI0ZK7cNubJ1c5eefw&usqp=CAU");
//     $manager->persist($refuge52);
//
//     $refuge53= new Refuge();
//     $refuge53->addRefugeName( 'Refuge de Chamarande');
//     $refuge53->addDepartementRefuge("91");
//     $refuge53->addPhotoRefuge("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpOwAMfwsbaKJnSMd--sFJemUeBGY2gWLu5Q&usqp=CAU");
//     $manager->persist($refuge53);
//
//     $refuge54= new Refuge();
//     $refuge54->addRefugeName('Refuge Grammont - Gennevilliers');
//     $refuge54->addDepartementRefuge("92");
//     $refuge54->addPhotoRefuge("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRJI27YhHDkEZRAG7kIFI0ZK7cNubJ1c5eefw&usqp=CAU");
//     $manager->persist($refuge54);
//
//     $refuge55= new Refuge();
//     $refuge55->addRefugeName('Papillon-Guadeloupe');
//     $refuge55->addDepartementRefuge("971");
//     $refuge55->addPhotoRefuge("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpOwAMfwsbaKJnSMd--sFJemUeBGY2gWLu5Q&usqp=CAU");
//     $manager->persist($refuge55);




        $manager->flush();








        // $product = new Product();
        // $manager->persist($product);
    }
}
