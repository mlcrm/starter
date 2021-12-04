<?php

namespace App\Form\Dashboard\User;

use App\Entity\AdminUser;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProfileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class, [
                'label' => 'Имя'
            ])
            ->add('lastname', TextType::class, [
                'label' => 'Фамилия'
            ])
            ->add('email', TextType::class, [
                'label' => 'Адрес эл.почты'
            ])
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'required' => false,
                'mapped' => false,
                'invalid_message' => 'Поля пароля должны совпадать',
                'first_options'  => [
                    'label' => 'Пароль',
                    'attr' => ['autocomplete' => 'off'],
                ],
                'second_options' => [
                    'label' => 'Повторите пароль',
                    'attr' => ['autocomplete' => 'off'],
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => AdminUser::class,
            'translation_domain' => 'dashboard'
        ]);
    }
}
