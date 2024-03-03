<?php

namespace App\Form;

use App\Entity\Societe;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;

class SocieteRegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('siret', TextType::class, [
                'label' => 'Siret',
                'attr' => ['class' => 'form-control']
            ])
        
            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
// this is read and encoded in the controller
'attr' => ['class' => 'form-control','autocomplete' => 'new-password'],
'mapped' => false,

'constraints' => [
    new NotBlank([
        'message' => 'Please enter a password',
    ]),
    new Length([
        'min' => 6,
        'minMessage' => 'Your password should be at least {{ limit }} characters',
        // max length allowed by Symfony for security reasons
        'max' => 4096,
    ]),
],
])
            ->add('nom_societe', TextType::class, [
                'label' => 'Nom Société',
                'attr' => ['class' => 'form-control']
            ])
            ->add('profession_societe', ChoiceType::class, [
                'label' => 'Profession',
                'choices' => [
                    'Choisissez...' => null,
                    'Vétérinaire' => 'Vétérinaire',
                    'Toiletteur' => 'Toiletteur',
                ],
                'attr' => ['class' => 'form-select'],
            ])
            ->add('nom_dirigeant', TextType::class, [
                'label' => 'Nom Dirigeant',
                'attr' => ['class' => 'form-control']
            ])
            ->add('adresse_societe', TextType::class, [
                'label' => 'Adresse Société',
                'attr' => ['class' => 'form-control']
            ])
            ->add('complement_adresse_societe', TextType::class, [
                'label' => 'Complement Adresse',
                'attr' => ['class' => 'form-control'],
                'required' => false,
            ])
            ->add('code_postal_societe', TextType::class, [
                'label' => 'Code Postal',
                'attr' => ['class' => 'form-control']
            ])
            ->add('ville_societe', TextType::class, [
                'label' => 'Ville',
                'attr' => ['class' => 'form-control']
            ])
            ->add('telephone_societe', TelType::class, [
                'label' => 'Telephone de la Société',
                'attr' => ['class' => 'form-control']
            ])
            ->add('telephone_dirigeant', TelType::class, [
                'label' => 'Telephone Dirigeant',
                'attr' => ['class' => 'form-control']
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email',
                'attr' => ['class' => 'form-control']
            ])
            ->add('images', TextType::class, [
                'label' => 'images',
                'attr' => ['class' => 'form-control'],
                'required' => false,
            ])
            ->add('date_creation_societe', DateType::class, [
                'label' => 'Date de création',
                'widget' => 'single_text',
                'required' => false,
                // 'data' => new \DateTime(), 
                // 'disabled' => true, 
            ])
            ->add('date_resiliation_societe', DateType::class, [
                'label' => 'Date de création',
                'widget' => 'single_text',
                'required' => false,
                // 'data' => new \DateTime(), 
                // 'disabled' => true, 
            ])
            ->add('date_validation_societe', DateType::class, [
                'label' => 'Date de création',
                'widget' => 'single_text',
                'required' => false,
                // 'data' => new \DateTime(), 
                // 'disabled' => true, 
            ])
            ->add('agreeTerms', CheckboxType::class, [
               
                'mapped' => false,
'constraints' => [
    new IsTrue([
        'message' => 'You should agree to our terms.',
    ]),
],
])
->add('submit', SubmitType::class, [
    'label' => 'Valider',
    'attr' => ['id' => 'save-button', 'class' => 'btn btn-lg btn-primary'] 
]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Societe::class,
        ]);
    }
}
