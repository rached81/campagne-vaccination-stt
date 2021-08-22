<?php

namespace App\Form;

use App\Entity\AgentVaccin;
use App\Entity\Site;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AgentVaccinType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('matricule' , TextType::class, ['label' => 'المعرف',
                'attr' => [
                    'placeholder' => 'أدخل المعرف',
                ], 'required' => true,])
            ->add('prenom', TextType::class, ['label' => 'الإسم',
                'attr' => [
                    'placeholder' => 'أدخل الإسم ',
                ], 'required' => true,])
            ->add('nom', TextType::class, ['label' => 'اللقب ',
                'attr' => [
                    'placeholder' => 'أدخل اللقب',
                ], 'required' => true,])
            ->add('cin', TextType::class, ['label' => 'ب.ت.و',
                'attr' => [
                    'placeholder' => ' أدخل ب.ت.و',
                ], 'required' => true,])
            ->add('date_nais', DateType::class, [ 'label' => 'تاريخ الولادة',
                'widget' => 'single_text'])
            // ->add('date_vaccin')
            ->add('codeEvax', TextType::class, ['label' => 'رقم التسجيل EVAX',
                'attr' => [
                    'placeholder' => 'أدخل رقم التسجيل  EVAX ',
                ], 'required' => true,])
            ->add('site', EntityType::class , [ 'label' => 'مكان العمل',
                'attr' => [
                    'placeholder' => 'أدخل مكان العمل',
                ], 'required' => true,
                'class' => Site::class,
                'choice_label' => function ($site) {
                    return $site->getLabel();
                }
                 ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => AgentVaccin::class,
        ]);
    }
}
