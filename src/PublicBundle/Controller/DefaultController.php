<?php

namespace PublicBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

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


}
