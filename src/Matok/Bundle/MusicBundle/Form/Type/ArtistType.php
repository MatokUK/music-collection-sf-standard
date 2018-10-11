<?php

namespace Matok\Bundle\MusicBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\UrlType;

class ArtistType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null, ['attr' => ['placeholder' => 'Queen']])
            ->add('webpage', UrlType::class);

    }
}