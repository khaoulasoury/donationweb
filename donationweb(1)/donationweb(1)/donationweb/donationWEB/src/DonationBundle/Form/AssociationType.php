<?php

namespace DonationBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class AssociationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nomAssociation')
            ->add('objectifAssociation')
            ->add('emailAssociation')
            ->add('passwordAssociation')
            ->add('addressAssociation')
            ->add('typeAssociation')
            ->add('descriptionAssociation')
            ->add('imageFile', VichImageType::class);



    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DonationBundle\Entity\Association'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'donationbundle_association';
    }


}
