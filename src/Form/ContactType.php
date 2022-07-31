<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName', TextType::class, [
                'label' => 'Prénom',
                'label_attr' => [
                    'class' => 'contact-form-label'
                ],
                'attr' => [
                    'placeholder' => 'Prénom',
                    'class' => 'contact-form-input'
                ],
            ])
            ->add('LastName', TextType::class, [
                'label' => 'Nom de famille',
                'label_attr' => [
                    'class' => 'contact-form-label'
                ],
                'attr' => [
                    'placeholder' => 'Nom de famille',
                    'class' => 'contact-form-input'
                ],
            ])
            ->add('email', EmailType::class, [
                'label' => 'E-mail',
                'label_attr' => [
                    'class' => 'contact-form-label'
                ],
                'attr' => [
                    'placeholder' => 'Adresse e-mail',
                    'class' => 'contact-form-input'
                ],
            ])
            ->add('comment', TextareaType::class, [
                'label' => 'Votre message',
                'label_attr' => [
                    'class' => 'contact-form-label'
                ],
                'attr' => [
                    'placeholder' => 'Message',
                    'class' => 'contact-form-textarea'
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
