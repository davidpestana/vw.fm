<?php

namespace PublicBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

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
        return $this->render('PublicBundle:Concesionarios:index.html.twig', array(
            // ...
        ));
    }

}
