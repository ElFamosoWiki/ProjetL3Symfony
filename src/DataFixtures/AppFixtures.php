<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Categorie;
use App\Entity\SousCategorie;


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
 
         

         $manager->persist($sportAuto);
         $manager->persist($Voiture);
         $manager->persist($Moto);
         $manager->persist($Bateau);
        

        $manager->flush();
    }
}
