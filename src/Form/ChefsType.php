<?php

namespace App\Form;

use App\Entity\Chefs;
use App\Entity\Images;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChefsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Nom')
            ->add('Prenom')
            ->add('Fonction')
            ->add('Twitter', UrlType::class)
            ->add('Facebook', UrlType::class)
            ->add('Instagram', UrlType::class)
            ->add('Linkedin', UrlType::class)
            ->add('images',EntityType::class,[
                'class' => Images::class,
                'choice_label'=> 'Name'
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Chefs::class,
        ]);
    }
}
