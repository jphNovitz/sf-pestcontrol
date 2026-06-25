<?php

namespace App\Controller\Admin;

use App\Entity\InterventionRequest;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class InterventionRequestCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return InterventionRequest::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Demande')
            ->setEntityLabelInPlural('Demandes')
            ->setDefaultSort(['createdAt' => 'DESC']);
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')->hideOnForm();
        yield TextField::new('name', 'Nom');
        yield TextField::new('phone', 'Téléphone');
        yield TextField::new('city', 'Commune');
        yield TextField::new('address', 'Adresse')->hideOnIndex();
        yield TextField::new('pestType', 'Nuisible');
        yield TextField::new('nestLocation', 'Emplacement')->hideOnIndex();
        yield ChoiceField::new('urgency', 'Urgence')->setChoices(InterventionRequest::getUrgencies());
        yield ChoiceField::new('status', 'Statut')->setChoices(InterventionRequest::getStatuses());
        yield ImageField::new('photoFilename', 'Photo')
            ->setBasePath('uploads/interventions')
            ->setUploadDir('public/uploads/interventions')
            ->hideOnIndex();
        yield TextareaField::new('message', 'Message')->hideOnIndex();
        yield TextareaField::new('internalNotes', 'Notes internes')->hideOnIndex();
        yield DateTimeField::new('createdAt', 'Créée le')->hideOnForm();
        yield DateTimeField::new('updatedAt', 'Modifiée le')->hideOnForm()->hideOnIndex();
    }
}
