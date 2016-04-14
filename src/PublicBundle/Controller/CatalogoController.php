<?php

namespace PublicBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * @Route("/volkswagen")
 */
class CatalogoController extends Controller
{
    /**
     * @Route("")
     */
    public function indexAction()
    {

        $em = $this->getDoctrine()->getManager();

        $vehiculos = $em->getRepository('PublicBundle:vehiculos')->findBy(array('marcaslug' => 'volkswagen' ));
        return $this->render('PublicBundle:Catalogo:index.html.twig', array(
            'vehiculos' => $vehiculos,
            // ...
        ));
    }




    public function presentacionAction()
    {

        $em = $this->getDoctrine()->getManager();

        $vehiculos = $em->getRepository('PublicBundle:vehiculos')->findBy(array('marcaslug' => 'volkswagen' ));

        return $this->render('PublicBundle:Catalogo:presentacion.html.twig', array(
            'vehiculos' => $vehiculos,
            // ...
        ));
    }





    /**
     * @Route("/{modeloslug}")
     */
    public function vehiculoAction($modeloslug)
    {

        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PublicBundle:kits')->findBy(array('marca' => 'volkswagen', 'modeloslug' => $modeloslug ));

        return $this->render('PublicBundle:Catalogo:vehiculo.html.twig', array(
            'entities' => $entities,
            'marca' => $entities[0]->getMarca(), 
            'modelo' => $entities[0]->getModelo()
        ));
    }

    /**
     * @Route("/{modelo}/{kit}")
     */
    public function kitAction($modelo, $kit)
    {



        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PublicBundle:kits')
            ->findOneBy(array('marcaslug' => 'volkswagen', 'modeloslug' => $modelo,'slug' => $kit ));
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find clientes entity.');
        }

        return $this->render('PublicBundle:Catalogo:kit.html.twig', array(
           "entity" => $entity
        ));
    }

}
