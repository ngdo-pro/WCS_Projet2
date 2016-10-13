<?php

namespace BookEditorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('BookEditorBundle:Default:index.html.twig');
    }




}
