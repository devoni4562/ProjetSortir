<?php

namespace App\Form;

use App\Entity\Campus;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserAdminType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email')
//           ->add('roles')
//          ->add('password')
            ->add('pseudo')
            ->add('lastname')
            ->add('firstname')
            ->add('phoneNumber')
            //->add('admin')
            ->add('actif')
            ->add(
                'roles', ChoiceType::class, [
                    'choices' => ['ROLE_ADMIN' => 'ROLE_ADMIN', 'ROLE_USER' => 'ROLE_USER', 'ROLE_CUSTOMER' => 'ROLE_CUSTOMER'],
                    'expanded' => true,
                    'multiple' => true,
                ]
            )
            ->add('userCampus', EntityType::class, [
                    'class' => Campus::class,
                    'choice_label' => 'name'
                ]
            );
        //    ->add('roles');
//            ->add('subscriptionedTravels');
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
