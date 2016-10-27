<?php

namespace BookEditorBundle\Controller;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use BookEditorBundle\Entity\Book;
use BookEditorBundle\Entity\Event;
use BookEditorBundle\Form\BookType;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * Book controller.
 *
 */
class BookController extends Controller
{
    /**
     * Lists all Book entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $books = $em->getRepository('BookEditorBundle:Book')->findAll();
        $carouselBooks = $em->getRepository('BookEditorBundle:Book')->findTheLastThree();

        $em->getRepository('BookEditorBundle:Event')->deletePastEvents($em);

        $events = $em->getRepository('BookEditorBundle:Event')->findEnabledEvents($em);
        return $this->render('book/index.html.twig', array(
            'books' => $books,
            'carouselBooks' => $carouselBooks,
            'events' => $events
        ));
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function legalNoticeAction()
    {
        return $this->render('book/legalNotice.html.twig');
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function ourBooksAction()
    {
        $em = $this->getDoctrine()->getManager();
        $books = $em->getRepository('BookEditorBundle:Book')->findAll();

        return $this->render('book/ourBooks.html.twig', array(
            'books' => $books,
        ));
    }

    /**
     * @param Book $book
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showToPublicAction(Book $book){
        $em = $this->getDoctrine()->getManager();
        $pressArticles = $em->getRepository('BookEditorBundle:PressArticle')->findAll();
        return $this->render('book/showToPublic.html.twig', array(
            'book' => $book,
            'pressArticles' => $pressArticles
        ));

    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function aboutUsAction() {

        return $this->render('book/aboutUs.html.twig');

    }

}

