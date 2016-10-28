<?php

namespace BookEditorBundle\Controller;

use Doctrine\ORM\EntityManager;
use Monolog\Handler\MailHandler;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use BookEditorBundle\Entity\Book;
use BookEditorBundle\Entity\Event;
use BookEditorBundle\Entity\Formulaire;
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
        $books = $em->getRepository('BookEditorBundle:Book')->getTaggedBook();
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
        $pressArticles = $em->getRepository('BookEditorBundle:PressArticle')->findBy(array('book' => $book));
        return $this->render('book/showToPublic.html.twig', array(
            'book' => $book,
            'pressArticles' => $pressArticles
        ));

    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function aboutUsAction(Request $request)
    {
        $formulaire = new Formulaire();
        $form = $this->createFormBuilder($formulaire)
            ->add('fMail', EmailType::class)
            ->add('fFirstname', TextType::class)
            ->add('fLastname', TextType::class)
            ->add('fMessage', TextareaType::class)
            ->add('submit', SubmitType::class, array('label' => 'Envoyer'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $mailer = $this->container->get('mailer');
            $message = \Swift_Message::newInstance()
                ->setSubject('Notification de Formulaire de Contact')
                ->setFrom('rdmproject.test@gmail.com')
                ->setTo('rdmproject.test@gmail.com')
                ->setBody(
                    '<html>' .
                    '<head></head>' .
                    '<body>' .
                    '<h2>RDM Edition Contact :</h2>' .
                    '<p><strong>' . $formulaire->getFFirstname() . ' ' . $formulaire->getFLastname() .
                    '</strong> vous a envoyé ce message :<br /><br />' . $formulaire->getFMessage() .
                    '<br /><br /><br />' .
                    'Adresse Email du contact : ' . $formulaire->getFMail() .
                    '</p>' .
                    '</body>' .
                    '</html>',
                    'text/html');

            $mailer->send($message);
            return $this->redirectToRoute('book_aboutUs');
        }

        return $this->render('book/aboutUs.html.twig', array(
            'form' => $form->createView(),
        ));


    }


}

