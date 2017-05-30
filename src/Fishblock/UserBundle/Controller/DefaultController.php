<?php

namespace Fishblock\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('FishblockUserBundle:Default:index.html.twig');
    }
}
