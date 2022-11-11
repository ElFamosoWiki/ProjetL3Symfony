<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use App\Entity\SousCategorie;
use App\Entity\Activite;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
         // Sport
         $sport = new Categorie;
         $sport->setNomCategorie('Sport');
 
         $combat = new SousCategorie;
         $combat->setNomsousCategorie('combat');
         $combat->setCategorie($sport);
 
         $course = new SousCategorie;
         $course->setNomsousCategorie('course');
         $course->setCategorie($sport);
 
         $équipe = new SousCategorie;
         $équipe->setNomsousCategorie('ballon');
         $équipe->setCategorie($sport);
 
         $manager->persist($sport);
         $manager->persist($combat);
         $manager->persist($course);
         $manager->persist($équipe);
 
         // Jeu
         $jeu = new Categorie;
         $jeu->setNomCategorie('Jeu');
 
         $Jeuvideo = new SousCategorie;
         $Jeuvideo->setNomsousCategorie('Jeu vidéo');
         $Jeuvideo->setCategorie($jeu);
 
         $jeucarte = new SousCategorie;
         $jeucarte->setNomsousCategorie('Jeu de carte');
         $jeucarte->setCategorie($jeu);
 
         $jeusociete = new SousCategorie;
         $jeusociete->setNomsousCategorie('Jeu de société');
         $jeusociete->setCategorie($jeu);
 
         $manager->persist($jeu);
         $manager->persist($Jeuvideo);
         $manager->persist($jeucarte);
         $manager->persist($jeusociete);
 
         // Sport Auto
         $sportAuto = new Categorie;
         $sportAuto->setNomCategorie('Sport automobile');
 
         $Voiture = new SousCategorie;
         $Voiture->setNomsousCategorie('Voiture');
         $Voiture->setCategorie($sportAuto);
 
         $Moto = new SousCategorie;
         $Moto->setNomsousCategorie('Moto');
         $Moto->setCategorie($sportAuto);
 
         $Bateau = new SousCategorie;
         $Bateau->setNomsousCategorie('Bateau');
         $Bateau->setCategorie($sportAuto);
 
         $F1 = new Activite;
         $F1->setNomActivite('F1');
         $F1->setSouscategorie($Voiture);

         $GpM = new Activite;
         $GpM->setNomActivite('GP Moto');
         $GpM->setSouscategorie($Voiture);

         $Tour = new Activite;
         $Tour->setNomActivite('Tour du globe');
         $Tour->setSouscategorie($Voiture);

         $manager->persist($sportAuto);
         $manager->persist($Voiture);
         $manager->persist($Moto);
         $manager->persist($Bateau);
         $manager->persist($F1);
         $manager->persist($GpM);
         $manager->persist($Tour);

        $manager->flush();
    }
}
