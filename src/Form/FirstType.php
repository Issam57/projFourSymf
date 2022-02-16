<?php

namespace App\Form;

use App\Entity\First;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FirstType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('four', IntegerType::class)
            ->add('statut', ChoiceType::class, [
                'choices' => [
                    'Sortie' => 'Sortie',
                    'SAC' => 'SAC',
                    'Ventilation' => 'Ventilation',
                    'Pas de feuille' => 'Pas de feuille'
                ]
            ])
            ->add('recuit', DateTimeType::class, [
                'widget' => 'single_text'
            ])
            ->add('emplacement', IntegerType::class, [
                'label' => 'Base',
                'required' => false
            ])
            ->add('commentaires', TextareaType::class, [
                'required' => false
            ])
            ->add('submit' ,SubmitType::class, [
                'label' => 'Enregistrer'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => First::class,
        ]);
    }
}
