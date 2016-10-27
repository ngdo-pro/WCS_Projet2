<?php
namespace BookEditorBundle\Admin;


use BookEditorBundle\Entity\Book;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

class BookAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('title', 'text', array(
                'label' => 'Titre',
                'required' => true
            ))
            ->add('author', 'text', array(
                'label' => 'Auteur',
                'required' => true
            ))
            ->add('description', 'ckeditor', array(
                'config_name' => 'my_config',
                'label' => 'Description',
                'config'      => array('uiColor' => '#ffffff', 'language' => 'fr')
            ))
            ->add('facebookLinkUrl', 'text', array(
                'label' => 'Lien vers la page Facebook',
                'required' => false
            ))
            ->add('coverImg', 'file', array(
                'label' => 'Image de la couverture',
                'required' => false
            ))
            ->add('releaseDate', 'date',array(
                'years' => range(2000, 2020),
                'format' => 'ddMMyyyy',
                'label' => 'Date de publication',
                'required' => true
            ))
            ->add('pressArticles', 'sonata_type_collection', array(
                'by_reference' => false
            ), array(
                'edit' => 'inline',
                'inline' => 'table',
                'sortable' => 'id',
            ))
            ->add('purchaseOrderImg', 'file', array(
                'label' => 'Bon de commande',
                'required' => false
            ))
            ->add('slug', 'text', array(
                'label' => 'Slug',
                'required' => true
            ))
        ;
    }

    // La liste des champs à partir desquels on pourra filtrer
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('title')
            ->add('author')
            ->add('releaseDate')

        ;
    }

    // Les champs que l'on veut voir dans la liste
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('title')
            ->add('author')
            ->add('description')
            ->add('imageUrl')
            ->add('releaseDate')
        ;
    }

    public function prePersist($book)
    {
        $this->manageFileUpload($book);
        foreach ($book->getPressArticles() as $pressArticle){
            $pressArticle->setBook($book);
        }

    }

    public function preUpdate($book)
    {
        $this->manageFileUpload($book);
        foreach ($book->getPressArticles() as $pressArticle){
            $pressArticle->setBook($book);
        }
    }

    private function manageFileUpload(Book $book)
    {
        if ($book->getCoverImg() || $book->getPurchaseOrderImg()) {
            $book->refreshuploaded();
        }
    }

}