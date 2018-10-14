<?php

namespace Matok\Bundle\MusicBundle\Form\Type;

use Matok\Bundle\MusicBundle\Entity\Album;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AlbumCollectionItemType extends AlbumType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder
            ->remove('artist');
    }
}