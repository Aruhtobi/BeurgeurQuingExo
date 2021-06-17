<?php

namespace App\Form;

use App\Entity\CategoriesFood;
use App\Entity\Food;
use App\Entity\Images;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FoodType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Nom')
            ->add('Description')
            ->add('prix', MoneyType::class)
            ->add('categoriesFood', EntityType::class,[
                'class'=>CategoriesFood::class,
                'choice_label'=> 'nom'
            ])
            ->add('images', EntityType::class,[
                'class' => Images::class,
                'choice_label'=> 'Name'
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Food::class,
        ]);
    }
}
