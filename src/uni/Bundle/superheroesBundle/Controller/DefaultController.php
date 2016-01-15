<?php

namespace uni\Bundle\superheroesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('unisuperheroesBundle:Default:index.html.twig', array('name' => $name));
    }
}
