<?php

namespace BookEditorBundle\Admin;

use BookEditorBundle\Entity\PressArticle;
use Doctrine\ORM\Mapping\Entity;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class PressArticleAdmin extends AbstractAdmin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('title')
            ->add('imageUrl')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('title')
            ->add('imageUrl')
            ->add('_action', null, array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                )
            ))
        ;
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('title', 'text', array(
                'label' => 'Titre'
            ))
            ->add('img', 'file', array(
                'label' => 'Photo de l\'article',
                'required' => false
            ))
            ->add('book', 'sonata_type_model_list', array(
                    'label'         => 'Livre',
                    'btn_add'       => false,
                    'btn_list'      => 'Liste des livres',
                    'btn_delete'    => false,
                    'btn_catalogue' => 'SonataAdminBundle'
                ), array(
                    'placeholder' => 'Aucun livre selectionné'
                ))
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('title')
            ->add('imageUrl')
        ;
    }

    public function prePersist($pressArticle)
    {
        $this->manageFileUpload($pressArticle);
    }

    public function preUpdate($pressArticle)
    {
        $this->manageFileUpload($pressArticle);
    }

    private function manageFileUpload(PressArticle $pressArticle)
    {
        if ($pressArticle->getImg()) {
            $pressArticle->refreshUploaded();
        }
    }
}
