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
        $image = $this->getSubject();

        // use $fileFieldOptions so we can add other options to the field
        $fileFieldOptions = array('required' => false);
        if ($image && ($webPath = 'uploads/img/covers/'.$image->getImageUrl())) {
            // get the container so the full path to the image can be set
            $container = $this->getConfigurationPool()->getContainer();
            $fullPath = $container->get('request')->getBasePath().'/'.$webPath;

            // add a 'help' option containing the preview's img tag
            $fileFieldOptions['help'] = '<img src="'.$fullPath.'" class="admin-preview" />';
        }
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
            ->add('coverImg', 'file', array('label' => 'Couverture du livre', 'required' => false ),$fileFieldOptions)
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
            ->add('description' , null, array ( 'label' => 'Description', 'template' => "/book/description.html.twig") )
            ->add('imageUrl' , null, array ( 'label' => 'Image de couverture', 'template' => "/book/list.html.twig") )
            ->add('releaseDate' , null, array ( 'label' => 'Date de publication', 'format' => 'Y') )
            ->add('tag' , null, array ( 'label' => 'Epingle') )
        ;
    }

    public function prePersist($book)
    {
        $this->manageFileUpload($book);
        $book->setSlug($book->getTitle());

    }

    public function preUpdate($book)
    {
        $this->manageFileUpload($book);
    }

    private function manageFileUpload(Book $book)
    {
        if ($book->getCoverImg() || $book->getPurchaseOrderImg()) {
            $book->refreshuploaded();
        }
    }

}