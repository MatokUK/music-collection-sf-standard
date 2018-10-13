<?php

namespace Matok\Bundle\MusicBundle\Form\Type;

use Matok\Bundle\MusicBundle\Entity\Artist;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArtistType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', null, ['attr' => ['placeholder' => 'Queen']])
            ->add('webpage', UrlType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Artist::class,
        ]);
    }
}