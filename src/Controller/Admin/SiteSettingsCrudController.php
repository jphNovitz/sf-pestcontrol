<?php

namespace App\Controller\Admin;

use App\Entity\SiteSettings;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Validator\Constraints\Image;

class SiteSettingsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return SiteSettings::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Réglages du site')
            ->setEntityLabelInPlural('Réglages du site');
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions->disable(Action::NEW, Action::DELETE);
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')->hideOnForm();
        yield TextField::new('siteName', 'Nom du site');
        yield TextField::new('headerTagline', 'Tagline du header');
        yield ImageField::new('logoFilename', 'Logo header')
            ->setBasePath('uploads/brand/logo')
            ->setUploadDir('public/uploads/brand/logo')
            ->setUploadedFileNamePattern('[slug]-[contenthash].[extension]')
            ->setFileConstraints([
                new Image(
                    maxSize: '2M',
                    mimeTypes: ['image/svg+xml', 'image/png', 'image/jpeg', 'image/webp'],
                    mimeTypesMessage: 'Ajoutez un logo SVG, PNG, JPG ou WebP.',
                ),
            ]);
        yield ImageField::new('faviconFilename', 'Favicon')
            ->setBasePath('uploads/brand/favicon')
            ->setUploadDir('public/uploads/brand/favicon')
            ->setUploadedFileNamePattern('[slug]-[contenthash].[extension]')
            ->setFileConstraints([
                new Image(
                    maxSize: '512k',
                    mimeTypes: ['image/x-icon', 'image/vnd.microsoft.icon', 'image/svg+xml', 'image/png'],
                    mimeTypesMessage: 'Ajoutez un favicon ICO, PNG ou SVG.',
                ),
            ]);
        yield TextField::new('logoAlt', 'Texte alternatif du logo');
        yield TextField::new('heroTitle', 'Titre hero');
        yield TextareaField::new('heroSubtitle', 'Texte hero');
        yield TextField::new('whatsappPhoneNumber', 'Numéro WhatsApp');
        yield TextareaField::new('whatsappMessage', 'Message WhatsApp prérempli');
        yield EmailField::new('notificationEmail', 'Email de réception');
        yield TextareaField::new('emergencyNotice', 'Message urgence');
        yield TextareaField::new('formIntro', 'Introduction formulaire');
    }
}
