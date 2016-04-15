<?php

namespace PublicBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use PublicBundle\Entity\contacto;
use PublicBundle\Form\contactoType;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return $this->render('PublicBundle:Default:index.html.twig');
    }


    /**
     * @Route("/videos")
     */
    public function videosAction()
    {
        return $this->render('PublicBundle:Default:videos.html.twig');
    }

     /**
     * Lists all clientes entities.
     *
     * @Route("/contacto")
     */
    public function contactoAction(Request $request)
    {

        $entity = new contacto();
        $form = $this->createForm('PublicBundle\Form\contactoType', $entity);
        if ($request->getMethod() == 'POST') {
                $form->handleRequest($request);
                if ($form->isValid()) {
                    $entity->setDateat( new \DateTime() );
                    $entity->setCp('00000');
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($entity);
                    $em->flush();
                    $this->sendMail($entity);
                    $this->get('session')->getFlashBag()->add(
                             'notice',
                            'correo correctamente enviado a '.$entity->getEmail());
                    return $this->redirect(
                        $this->generateUrl('public_default_postcontacto',
                        array("token" => $this->get('cryptManager')->encrypt($entity))
                        ));
                }
        }

        return $this->render('PublicBundle:Default:contacto.html.twig',array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));


    }


    /**
     * 
     *
     * @Route("/gracias/{token}")
     */
    public function postcontactoAction(Request $request,$token)
    {


        $contacto = $this->get('cryptManager')->decrypt($token);
       // $em = $this->getDoctrine()->getManager();

        /*if(!$cliente = $em->getRepository('erpBundle:clientes')->findOneBy(array("email" => $contacto->getEmail()))){
            $cliente = new clientes();
            $cliente->setName($contacto->getName());
            $cliente->setCp($contacto->getCp());
            $cliente->setProvincia($contacto->getProvincia());
            $cliente->setEmail($contacto->getEmail());
            $cliente->setTelefono($contacto->getTelefono());
            $cliente->setObservaciones("Cliente Autocreado");
            $cliente->setFurgo($contacto->getFurgo());
        }

        $form = $this->createForm(new clienteType(), $cliente);
  
        if ($request->getMethod() == 'POST') {
                $form->handleRequest($request);
                if ($form->isValid()) {              
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($cliente);
                    $em->flush();
                    $this->get('session')->getFlashBag()->add(
                             'notice',
                            'hemos registrado tus datos correctamente, muchas gracias');

                    return $this->redirect($this->generateUrl('public_default_postcontacto',array('token' => $token)));
                }
        }*/

        return $this->render('PublicBundle:Default:postcontacto.html.twig',array(
            //'token'  => $token,
            //'cliente' => $cliente,
            'contacto' => $contacto,
           // 'form'   => $form->createView(),
        ));

    }


    private function sendMail($entity){

        $message = \Swift_Message::newInstance()
            ->setSubject("CONTACTO: ".$entity->getName())
            ->setFrom('contacto@furgomania.com')
            ->setTo(array($entity->getEmail(),"contacto@furgomania.com"))
            //->setCc('contacto@furgomania.com')
            ->setBody(
                $this->renderView(
                    'PublicBundle:Default:email.contacto.html.twig',
                    array( 'entity'=> $entity)
                ), 'text/html'
            )
        ;

        $this->get('mailer')->send($message);

    }

}
