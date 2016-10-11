<?php

namespace BookEditorBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BookType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('author')
            ->add('description')
            ->add('facebookLinkUrl')
            ->add('imageUrl', FileType::class, array('label' => 'Photo de la couverture du livre', 'data_class' => null))
            ->add('pressTitle')
            ->add('pressImageUrl', FileType::class, array('label' => 'Photo de l\'article de presse', 'data_class' => null))
            ->add('releaseDate', 'datetime')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BookEditorBundle\Entity\Book'
        ));
    }
}
