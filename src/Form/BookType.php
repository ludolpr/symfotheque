<?php

namespace App\Form;

use App\Entity\Book;
use App\Entity\Author;
use App\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BookType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('resume')
            ->add('date', null, [
                'widget' => 'single_text',
            ])
            ->add('author', EntityType::class, [
                'class' => Author::class,
                'choice_label' => ' firstName',
            ])
            ->add('category', EntityType::class, [
                'class' => Category::class,
                'choice_label' => ' categoryName',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Book::class,
        ]);
    }
}