<?php

namespace ApiBundle\Controller;


use FOS\RestBundle\Controller\Annotations;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Request\ParamFetcherInterface;

#use FOS\RestBundle\View\View;

use Symfony\Component\Security\Core\Exception\AccessDeniedException;

use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Form\FormTypeInterface;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use PublicBundle\Entity\concesionario;
use PublicBundle\Form\concesionarioType;


class DefaultController extends FOSRestController
{
     /**
     * Auth user info
     *
     * @ApiDoc(
     *   resource = true,
     *   statusCodes = {
     *     200 = "Returned when successful"
     *   }
     * )
     *
     * @return array
     */


    public function getUserAction()
    {

        $user = $this->get('security.token_storage')->getToken()->getUser();

        $data = array("user" => $user);
        $view = $this->view($data);
        return $this->handleView($view);
    }


     /**
     * Creates a new consumption from the submitted data.
     *
     * @ApiDoc(
     *   resource = true,
     *   input = "PublicBundle\Form\concesionarioType",
     *   statusCodes = {
     *     200 = "Returned when successful",
     *     400 = "Returned when the form has errors"
     *   }
     * )
     *
     *     
     * @param Request $request the request object
     *
     * @return array
     */
    public function postConcesionarioAction(Request $request)
    {


        $entity = new concesionario();

        $form = $this->createForm('PublicBundle\Form\concesionarioType', $entity);

        $form->handleRequest($request);



		if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            $data = array('message' => 'concesionario created', 'entity' => $entity);
		}
      
       //
        $view = $this->view($data);
        return $this->handleView($view);
    
    }

      /**
     * Update existing consumption from the submitted data.
     *
     * @ApiDoc(
     *   resource = true,
     *   input = "PublicBundle\Form\concesionarioType",
     *   statusCodes = {
     *     204 = "Returned when successful",
     *     404 = "Returned when unable to find",
     *     400 = "Returned when the form has errors"
     *   }
     * )
     *
     *
     * @param Request $request the request object
     * @param int     $id      the consumption id
     *
     * @return array
     *
     * @throws NotFoundHttpException when consumption not exist
     */
    public function putConcesionarioAction(Request $request, concesionario $entity)
    {

        $form = $this->createForm('PublicBundle\Form\concesionarioType', $entity, array('method' => 'PUT'));
       
        $form->handleRequest($request);

        $data = array();
        
	 	if ($form->isValid()) {
       
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $data = array('message' => 'concesionario updated', 'entity' => $entity);
        }

        $view = $this->view($data);
        return $this->handleView($view);

    }













}
