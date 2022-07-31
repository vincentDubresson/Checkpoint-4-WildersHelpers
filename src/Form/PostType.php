<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Post;
use App\Entity\Type;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;

class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Titre',
                'label_attr' => [
                    'class' => 'add-post-form-label'
                ],
                'attr' => [
                    'placeholder' => 'Titre',
                    'class' => 'add-post-form-input'
                ],
            ])
            ->add('posterFile', VichFileType::class, [
                'label' => 'Déposer une image',
                'label_attr' => [
                    'class' => 'add-post-form-label'
                ],
                'required'      => false,
                'allow_delete'  => false, // not mandatory, default is true
                'download_uri' => false, // not mandatory, default is true
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description',
                'label_attr' => [
                    'class' => 'add-post-form-label'
                ],
                'attr' => [
                    'placeholder' => 'Votre description ici !',
                    'class' => 'add-post-form-textarea'
                ],
            ])
            ->add('category', EntityType::class, [
                'class' => Category::class,
                'choice_label' => 'name',
                'label' => 'Catégorie',
                'placeholder' => 'Catégorie',
                'label_attr' => [
                    'class' => 'add-post-form-label'
                ],
                'attr' => [
                    'class' => 'add-post-form-select',
                ],
            ])
            ->add('type', EntityType::class, [
                'class' => Type::class,
                'choice_label' => 'name',
                'label' => 'Type',
                'placeholder' => 'Type',
                'label_attr' => [
                    'class' => 'add-post-form-label'
                ],
                'attr' => [
                    'class' => 'add-post-form-select',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Post::class,
        ]);
    }
}
