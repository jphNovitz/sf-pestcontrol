<?php

namespace App\Controller\Admin;

use App\Entity\InterventionRequest;
use App\Entity\InterventionZone;
use App\Entity\LandingAdvice;
use App\Entity\SiteSettings;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Attribute\AdminDashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;

#[AdminDashboard(routePath: '/admin', routeName: 'admin')]
class DashboardController extends AbstractDashboardController
{
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Guêpes & Frelons');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToRoute('Voir le site', 'fa fa-home', 'app_default');
        yield MenuItem::section('Landing page');
        yield MenuItem::linkTo(SiteSettingsCrudController::class, 'Réglages', 'fa fa-sliders');
        yield MenuItem::linkTo(InterventionZoneCrudController::class, 'Zones', 'fa fa-map-marker-alt');
        yield MenuItem::linkTo(LandingAdviceCrudController::class, 'Conseils', 'fa fa-list');
        yield MenuItem::section('Demandes');
        yield MenuItem::linkTo(InterventionRequestCrudController::class, 'Interventions', 'fa fa-inbox');
        yield MenuItem::section('Accès');
        yield MenuItem::linkTo(UserCrudController::class, 'Utilisateurs', 'fa fa-user');
    }
}
