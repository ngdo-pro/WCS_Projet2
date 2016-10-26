<?php
namespace BookEditorBundle\Admin;


use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

class EventAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('title', 'text', array(
                'label' => 'Titre',
                'required' => true
            ))
            ->add('description', 'ckeditor', array(
                'config_name' => 'my_config',
                'config'      => array('uiColor' => '#ffffff'),
            ))
            ->add('dateStart', 'date', array(
                'label' => 'Date de début de publication de l\'évènement',
                'required' => true
            ))
            ->add('dateEnd', 'date', array(
                'label' => 'Date de fin de publication de l\'évènement',
                'required' => true
            ))
        ;
    }

    // La liste des champs à partir desquels on pourra filtrer
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('title')
            ->add('dateStart')
            ->add('dateEnd')
        ;
    }

    // Les champs que l'on veut voir dans la liste
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('title')
            ->add('dateStart')
            ->add('dateEnd')
        ;
    }

}