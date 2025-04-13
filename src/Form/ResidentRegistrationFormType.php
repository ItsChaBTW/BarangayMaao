<?php

namespace App\Form;

use App\Entity\Resident;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class ResidentRegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'label' => 'Email',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Enter your email'
                ]
            ])
            ->add('firstName', TextType::class, [
                'label' => 'First Name',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Enter your first name'
                ]
            ])
            ->add('lastName', TextType::class, [
                'label' => 'Last Name',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Enter your last name'
                ]
            ])
            ->add('plainPassword', PasswordType::class, [
                'mapped' => false,
                'label' => 'Password',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Enter your password'
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        'max' => 4096,
                    ]),
                ],
            ])
            ->add('address', TextType::class, [
                'label' => 'Address',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Enter your address'
                ]
            ])
            ->add('contactNumber', TextType::class, [
                'label' => 'Contact Number',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Enter your contact number'
                ]
            ])
            ->add('civilStatus', ChoiceType::class, [
                'label' => 'Civil Status',
                'choices' => [
                    'Single' => 'Single',
                    'Married' => 'Married',
                    'Widowed' => 'Widowed',
                    'Separated' => 'Separated',
                ],
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('birthDate', BirthdayType::class, [
                'label' => 'Birth Date',
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'form-control'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Resident::class,
        ]);
    }
} 