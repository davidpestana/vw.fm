<?php

namespace PublicBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use PublicBundle\Entity\concesionario;

/**
 * @Route("/exposiciones")
 */
class ConcesionariosController extends Controller
{
	 /**
     * @Route("")
     */
    public function indexAction()
    {

    	$em = $this->getDoctrine()->getManager();

        $concesionarios = $em->getRepository('PublicBundle:concesionario')->findAll();


        return $this->render('PublicBundle:Concesionarios:index.html.twig', array(
            "concesionarios" => $concesionarios,
        ));
    }

}
