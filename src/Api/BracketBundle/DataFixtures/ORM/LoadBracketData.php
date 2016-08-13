<?php

namespace Api\BracketBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Api\BracketBundle\Entity\Gestion;

Class LoadBracketData implements FixtureInterface {
    public function load(ObjectManager $manager)
    {
        $bracket = new Gestion();
        $bracket
            ->setNom('Tournois Rocket League 1v1')
            ->setDescription('Tournois 1v1')
            ->setEtat('1')
            ->setJson('{"teams":[["Team 1","Team 2"],["Team 3","Team 4"]],"results":[[[[1,0],[2,7]],[[null,null]s[null,null]]]]}');
        $bracket1 = new Gestion();
        $bracket1
            ->setNom('Tournois Rocket League 2v2, ééàà')
            ->setDescription('Tournois 2v2')
            ->setEtat('1')
            ->setJson('{"teams":[["Dianophe","FDP 2"],["Team 3","Team 4"]],"results":[[[[50,14],[7,84]],[[null,null]s[null,null]]]]}');
        $bracket2 = new Gestion();
        $bracket2
            ->setNom('Tournois CS:GO 5v5')
            ->setDescription('5v5')
            ->setEtat('1')
            ->setJson('{"teams":[["Dianophe","FDP 2"],["LOL","KIILOUTOU"]],"results":[[[[50,14],[7,84]],[[51,5]s[45,46]]]]}');

        $manager->persist($bracket);
        $manager->persist($bracket1);
        $manager->persist($bracket2);
        $manager->flush();
    }
}