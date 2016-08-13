<?php

namespace Api\BracketBundle\Controller;

use \Api\BracketBundle\Entity\Gestion;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations\View;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\HttpFoundation\Response;

class BracketController extends Controller
{

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
    public function getBracketAction(Gestion $bracket)
    {
        $this->get('doctrine.orm.entity_manager')->getFilters()->disable('softdeleteable');
        return array('brackets' => $bracket);
    }
}