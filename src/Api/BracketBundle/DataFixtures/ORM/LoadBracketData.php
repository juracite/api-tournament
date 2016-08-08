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

        $manager->persist($bracket);
        $manager->flush();
    }
}