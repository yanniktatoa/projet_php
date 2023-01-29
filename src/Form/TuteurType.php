<?php

namespace App\Form;

use App\Entity\Tuteur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TuteurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Nom')
            ->add('Prenoms')
            ->add('Profession')
            ->add('NomEmployeur')
            ->add('Adresse')
            ->add('NumeroTelephone')
            ->add('Email')
            ->add('etudiant')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Tuteur::class,
        ]);
    }
}
