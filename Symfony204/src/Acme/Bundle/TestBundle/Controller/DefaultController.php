<?php

namespace Acme\Bundle\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction($name)
    {
        $frameworks = array('Symfony', 'Lithium', 'CakePHP');
        return $this->render('AcmeTestBundle:Default:index.html.twig', array('name' => $name, 'frameworks' => $frameworks));
    }
}
