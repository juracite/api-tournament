<?php

namespace Api\BracketBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\EntityManager;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ApiBracketBundle:Bracket:bracket_setup.html.twig');
        $serializer = $this->get('serializer');
    }

    public function ajoutAction(EntityManager $entityManager) {
        $em = $entityManager->findAll('');
    }
}