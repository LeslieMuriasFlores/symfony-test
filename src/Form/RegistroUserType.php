<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class RegistroUserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class)
            ->add('nombre', TextType::class)
            ->add('apellido')
            ->add('cedula')
            ->add('pais')
            ->add('password', PasswordType::class);
           // ->add('roles')
            /*->add('password', RepeatedType::class, array(
                'type' => PasswordType::class,
                'first_options'  => array('label' => 'Password'),
                'second_options' => array('label' => 'Confirmar Password'),
            ));*/
            //->add('banco')
            //->add('empresa');
           
        
    }

   
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
             //desabilitar token scrf
            'csrf_protection' => false,
            'data_class' => User::class,
        ]);
    }

    //dos metodos para que no tengamos que especificar el nombre del form en la creacion del objeto y su registro en bd
    public function getBlockPrefix()
    {
        return '';
    }
    public function getName()
    {
        return '';
    }
}
