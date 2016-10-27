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
                'required' => true
            ))
            ->add('pressTitle', 'text', array(
                'label' => 'Titre de l\'article de presse',
                'required' => false
            ))
            ->add('pressImg', 'file', array(
                'label' => 'Image de l\'article de presse',
                'required' => false
            ))
            ->add('releaseDate', 'date',array(
                'years' => range(2000, 2020),
                'format' => 'ddMMyyyy',
                'label' => 'Date de publication',
                'required' => true
            ))
            ->add('purchaseOrderImg', 'file', array(
                'label' => 'Bon de commande',
                'required' => false
            ))
            ->add('slug', 'text', array(
                'label' => 'Slug',
                'required' => true
            ))
            ->add('tag', 'checkbox', array(
                'label' => 'Epingler',
                'required' => false
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
            ->addIdentifier( 'title' , null, array ( 'label' => 'Titre') )
            ->add('author' , null, array ( 'label' => 'Autheur') )
            ->add('description' , null, array ( 'label' => 'Description') )
            ->add('imageUrl' , null, array ( 'label' => 'Image de couverture') )
            ->add('releaseDate' , null, array ( 'label' => 'Date de publication') )
            ->add('tag' , null, array ( 'label' => 'Epingle') )
        ;
    }

    public function prePersist($image)
    {
        $this->manageFileUpload($image);
    }

    public function preUpdate($image)
    {
        $this->manageFileUpload($image);
    }

    private function manageFileUpload(Book $image)
    {
        if ($image->getCoverImg() || $image->getPressImg() || $image->getPurchaseOrderImg()) {
            $image->refreshuploaded();
        }
    }

}