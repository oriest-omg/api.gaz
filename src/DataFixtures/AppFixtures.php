<?php

namespace App\DataFixtures;

use App\Entity\EchangerGaz;
use App\Entity\Fournisseur;
use App\Entity\Gaz;
use App\Entity\RemplacerGaz;
use App\Entity\User;
use App\Repository\FournisseurRepository;
use App\Repository\GazRepository;
use Faker\Factory;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    /**
     * L'encodeur de mots de passe
     *
     * @var UserPasswordHasherInterface
     */
    private $encoder;

    public function __construct(
        UserPasswordHasherInterface $encoder,
        FournisseurRepository $fournisseurRepository,
        GazRepository $gazRepository)
    {
        $this->encoder = $encoder;
        $this->fournisseurRepository = $fournisseurRepository;
        $this->gazRepository = $gazRepository;
    }
    public function load(ObjectManager $manager)
    {
            $faker = Factory::create('fr_FR');

            $user = new User();

            $hash = $this->encoder->hashPassword($user, "password");

            $user->setUsername("oriest")
                ->setPassword($hash);

            $manager->persist($user);

            $fournisseur = new Fournisseur();
            $fournisseur->setNomFournisseur($faker->name())
                        ->setNumeroFournisseur(mt_rand(0000000000,9999999999))
                        ->setNomStation("Oryx");
            $manager->persist($fournisseur);


            $fournisseur = new Fournisseur();
            $fournisseur->setNomFournisseur($faker->name())
                        ->setNumeroFournisseur(mt_rand(0000000000,9999999999))
                        ->setNomStation("Shell");
            $manager->persist($fournisseur);

            $manager->flush();

            $fournisseurs = $this->fournisseurRepository->findAll();
            foreach($fournisseurs as $fournisseur)
            {
                $gaz= new Gaz();
                $gaz->setNomStationGaz($fournisseur->getNomStation())
                    ->setPrix(2200)
                    ->setQuantite(mt_rand(0,20))
                    ->setType("B6")
                    ->setEtat("rempli");
                    
                $manager->persist($gaz);
                $gaz= new Gaz();
                $gaz->setNomStationGaz($fournisseur->getNomStation())
                    ->setPrix(2200)
                    ->setQuantite(mt_rand(0,20))
                    ->setType("B6")
                    ->setEtat("vide");
                    
                $manager->persist($gaz);
                $gaz= new Gaz();
                $gaz->setNomStationGaz($fournisseur->getNomStation())
                    ->setPrix(5500)
                    ->setQuantite(mt_rand(0,20))
                    ->setType("B12")
                    ->setEtat("rempli");
                    
                $manager->persist($gaz);
                $gaz= new Gaz();
                $gaz->setNomStationGaz($fournisseur->getNomStation())
                    ->setPrix(5500)
                    ->setQuantite(mt_rand(0,20))
                    ->setType("B12")
                    ->setEtat("vide");
                    
                $manager->persist($gaz);
                $manager->flush();
            }

            $gazs = $this->gazRepository->findByEtat('vide');
                foreach($gazs as $gaz)
                {
                    $fournisseur = $this->fournisseurRepository->findOneBy(['nomStation' => $gaz->getNomStationGaz()]);
                    $remlacerGaz = new RemplacerGaz();
                    $remlacerGaz->setDate($faker->dateTime())
                                ->setQuantite(mt_rand(0,$gaz->getQuantite()))
                                ->setPrix($gaz->getPrix())
                                ->setGaz($gaz)
                                ->setFournisseur($fournisseur);
                    $manager->persist($remlacerGaz);
                }

                $gazs = $this->gazRepository->findByEtat('rempli');
                foreach($gazs as $gaz)
                {
                    $echangerGaz = new EchangerGaz();
                    $echangerGaz->setDate($faker->dateTime())
                                ->setQuantite(mt_rand(0,$gaz->getQuantite()))
                                ->setPrix($gaz->getPrix())
                                ->setGaz($gaz);
                    $manager->persist($echangerGaz);
                }
            $manager->flush();
    }
}
