<?php

namespace Matok\Bundle\MusicBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class AlbumType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', null, ['attr' => ['placeholder' => 'Don\'t Stop Me Now']])
            ->add('year', IntegerType::class);

    }
}