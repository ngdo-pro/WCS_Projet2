<?php

namespace BookEditorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('BookEditorBundle:Default:index.html.twig');
    }
    function cutString($description) {
        $length = 50;
        if(strlen($description) > $length) {
            $cut = substr($description, 0, $length) . '...';
            return $cut;
        }
        else{
            return $description;
        }

    }



}
