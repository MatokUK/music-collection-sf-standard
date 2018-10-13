<?php

namespace Matok\Bundle\MusicBundle\Form\Type;

use Matok\Bundle\MusicBundle\Entity\Album;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AlbumType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', null, ['attr' => ['placeholder' => 'Don\'t Stop Me Now']])
            ->add('genre')
            ->add('year', IntegerType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Album::class,
        ]);
    }
}