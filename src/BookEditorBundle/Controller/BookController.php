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

    public function legalNoticeAction()
    {
        return $this->render('book/legalNotice.html.twig');
    }

    public function ourBooksAction()
    {
        $em = $this->getDoctrine()->getManager();

        $books = $em->getRepository('BookEditorBundle:Book')->findAll();


        return $this->render('book/ourBooks.html.twig', array(
            'books' => $books,
        ));
    }

    /**
     * Creates a new Book entity.
     *
     */
    public function newAction(Request $request)
    {
        $book = new Book();
        $form = $this->createForm('BookEditorBundle\Form\BookType', $book);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file */
            $file = $book->getImageUrl();
            $fileName = md5(uniqid()) . '.' . $file->guessExtension();
            $file->move(
                $this->getParameter('covers_directory'),
                $fileName
            );
            $book->setImageUrl($fileName);

            $file = $book->getPressImageUrl();
            $fileName = md5(uniqid()) . '.' . $file->guessExtension();
            $file->move(
                $this->getParameter('pressArticle_directory'),
                $fileName
            );
            $book->setPressImageUrl($fileName);

            $file = $book->getPurchaseOrderImageUrl();
            $fileName = md5(uniqid()) . '.' . $file->guessExtension();
            $file->move(
                $this->getParameter('purchaseOrder_directory'),
                $fileName
            );
            $book->setPurchaseOrderImageUrl($fileName);

            $em = $this->getDoctrine()->getManager();
            $em->persist($book);
            $em->flush();

            return $this->redirectToRoute('book_show', array('id' => $book->getId()));
        }

        return $this->render('book/new.html.twig', array(
            'book' => $book,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Book entity.
     *
     */
    public function showAction(Book $book)
    {
        $deleteForm = $this->createDeleteForm($book);

        return $this->render('book/show.html.twig', array(
            'book' => $book,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    public function showToPublicAction(Book $book){
        return $this->render('book/showToPublic.html.twig', array(
            'book' => $book
        ));

    }



    /**
     * Displays a form to edit an existing Book entity.
     *
     */
    public function editAction(Request $request, Book $book)
    {
        $deleteForm = $this->createDeleteForm($book);
        $editForm = $this->createForm('BookEditorBundle\Form\BookType', $book);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($book);
            $em->flush();

            return $this->redirectToRoute('book_edit', array('id' => $book->getId()));
        }

        return $this->render('book/edit.html.twig', array(
            'book' => $book,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Book entity.
     *
     */
    public function deleteAction(Request $request, Book $book)
    {
        $form = $this->createDeleteForm($book);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($book);
            $em->flush();
        }

        return $this->redirectToRoute('book_index');
    }



    public function aboutUsAction() {

        return $this->render('book/aboutUs.html.twig');

    }

    /**
     * Creates a form to delete a Book entity.
     *
     * @param Book $book The Book entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Book $book)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('book_delete', array('id' => $book->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

}

