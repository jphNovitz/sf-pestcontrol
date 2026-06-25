<?php

namespace App\Form;

use App\Entity\InterventionRequest;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class InterventionRequestType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom',
            ])
            ->add('phone', TelType::class, [
                'label' => 'Téléphone',
            ])
            ->add('city', TextType::class, [
                'label' => 'Commune',
            ])
            ->add('address', TextType::class, [
                'label' => "Adresse de l'intervention",
            ])
            ->add('pestType', ChoiceType::class, [
                'label' => 'Type de nuisible',
                'placeholder' => 'Sélectionner',
                'choices' => [
                    'Guêpes' => 'Guêpes',
                    'Frelons asiatiques' => 'Frelons asiatiques',
                    'Frelons européens' => 'Frelons européens',
                    'Je ne sais pas' => 'Je ne sais pas',
                ],
            ])
            ->add('nestLocation', ChoiceType::class, [
                'label' => 'Emplacement du nid',
                'placeholder' => 'Sélectionner',
                'choices' => [
                    'Toiture ou corniche' => 'Toiture ou corniche',
                    'Mur, caisson ou volet' => 'Mur, caisson ou volet',
                    'Arbre ou haie' => 'Arbre ou haie',
                    'Sol ou abri de jardin' => 'Sol ou abri de jardin',
                ],
            ])
            ->add('urgency', ChoiceType::class, [
                'label' => "Niveau d'urgence",
                'placeholder' => 'Sélectionner',
                'choices' => InterventionRequest::getUrgencies(),
            ])
            ->add('photo', FileType::class, [
                'label' => 'Photo du nid',
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File(
                        maxSize: '8M',
                        mimeTypes: ['image/jpeg', 'image/png', 'image/webp', 'image/gif'],
                        mimeTypesMessage: 'Ajoutez une image JPG, PNG, WebP ou GIF.',
                    ),
                ],
            ])
            ->add('message', TextareaType::class, [
                'label' => 'Message',
                'required' => false,
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Envoyer la demande',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => InterventionRequest::class,
        ]);
    }
}
