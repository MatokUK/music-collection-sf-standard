<?php

namespace Matok\Bundle\MusicBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

class DeleteEntryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('delete', SubmitType::class, ['label' => 'Yes, delete it..', 'attr' => ['class' => 'btn btn-danger']])
            ->add('cancel', SubmitType::class, ['label' => 'Nooo! Take me back to listing', 'attr' => ['class' => 'btn btn-warning']])
        ;
    }
}