<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email')
            ->add('password', RepeatedType::class, [
                'type'=>PasswordType::class,
                'invalid_message'=>'Le mot de passe et la confirmation doivent être identiques',
                'label'=> 'Votre mot de passe',
                'required'=>true,
                'first_options'=>[
                    'label'=>'Mot de Passe',
                    'attr'=>[
                        'placeholder'=>'Merci de saisir votre mot de passe'
                    ]],
                'second_options'=>[
                    'label'=>'Confirmation',
                    'attr'=>[
                        'placeholder'=>'Merci de confirmer votre mot de passe'
                    ]]
            ])
            ->add('firstname')
            ->add('lastname')
            ->add('nickname')
            ->add('age')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
