<?php

namespace Api\BracketBundle\Controller;

use Api\BracketBundle\Entity\Gestion;
use Api\BracketBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations\View;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\HttpFoundation\Response;

class BracketController extends Controller {

    /**
     * @return array
     * @View()
     */
    public function getBracketsAction()
    {
        $brackets = $this->getDoctrine()->getRepository('ApiBracketBundle:Gestion')
            ->findAll();

        return $this->render('ApiBracketBundle:Bracket:bracket_setup.html.twig', array('brackets' => $brackets));
    }

    /**
     * @param Gestion $bracket
     * @return array
     * @View()
     * @ParamConverter("bracket", class="ApiBracketBundle:Gestion")
     */
    public function getBracketAction(Gestion $bracket){
        return array('bracket' => $bracket);
    }

    public function ajaxAction()
    {

        $brackets = $this->getDoctrine()->getRepository('ApiBracketBundle:Gestion')
            ->findAll();

        $template = $this->forward('ApiBracketBundle:Bracket:bracket_setup.html.twig', array('brackets' => $brackets))->getContent();

        $json = json_encode($template);
        $response = new Response($json, 200);
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }
}