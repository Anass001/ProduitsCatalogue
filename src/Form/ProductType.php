<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Product;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name',
                TextType::class,
                ['label' => 'Nom',
                    'attr' => ['class' => 'form-control'], 'row_attr' => ['class' => 'mt-3']
                ])
            ->add('price', NumberType::class, ['label' => 'Prix', 'attr' => ['class' => 'form-control'], 'row_attr' => ['class' => 'mt-3'],])
            ->add('description',
                TextareaType::class, [
                    'label' => 'Description',
                    'attr' => ['class' => 'form-control'],
                    'row_attr' => ['class' => 'mt-3'],
                ])
            ->add('category',
                EntityType::class, [
                    'class' => Category::class,
                    'choice_label' => 'name',
                    'label' => 'Catégorie',
                    'attr' => ['class' => 'form-control'],
                    'row_attr' => ['class' => 'mt-3'],
                ])
            ->add('save', SubmitType::class, ['label' => 'Ajouter', 'attr' => ['class' => 'btn btn-primary mt-5 col-3']]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}