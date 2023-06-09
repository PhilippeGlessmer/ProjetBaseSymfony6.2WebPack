<?php

namespace App\Form\Utilisateurs;

use App\Entity\Utilisateurs\UserProfil;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserProfilType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('genre')
            ->add('nom')
            ->add('prenom')
            ->add('naissanceAt')
            ->add('avatar')
            ->add('createdAt')
            ->add('upadatedAt')
            ->add('user')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => UserProfil::class,
        ]);
    }
}
