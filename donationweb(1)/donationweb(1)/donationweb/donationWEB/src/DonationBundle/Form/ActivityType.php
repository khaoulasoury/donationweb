<?php

namespace DonationBundle\Form;

use Doctrine\ORM\Mapping\Entity;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ActivityType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nameEv',EntityType::class,array(
        'class' => 'DonationBundle:Event','choice_label'=>'nameEv', 'multiple'=>false
    ))
            ->add('nameAc')
            ->add('duration')
            ->add('descriptionAc')
            ->add('typeAc')
            ->add(  'submit',submittype::class)
        ;
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DonationBundle\Entity\Activity'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'donationbundle_activity';
    }


}
