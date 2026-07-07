<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Attribute\AdminDashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
// use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;

#[AdminDashboard(routePath: '/admin', routeName: 'admin')]
class DashboardController extends AbstractDashboardController
{
    public function index(): Response
    {
        // return parent::index();

        return $this->render('admin/dashboard.html.twig');

        // $routeBuilder = $this->container->get(AdminUrlGenerator::class);
        // $url = $routeBuilder->setController(PageContentCrudController::class)->generateUrl();
        // return $this->redirect($url);


        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // return $this->redirectToRoute('admin_user_index');

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirectToRoute('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Canopées - Back-Office');
    }

    public function configureMenuItems(): iterable
    {
    yield MenuItem::linkToDashboard('Tableau de bord', 'fa fa-home');

    yield MenuItem::section('Accueil');
    yield MenuItem::linkTo(SliderImageCrudController::class, 'Photos du slider', 'fa fa-images');
    yield MenuItem::linkTo(TargetAudienceCrudController::class, 'Public cible', 'fa fa-users');
    yield MenuItem::linkTo(RealisationImageCrudController::class, 'Réalisations', 'fa fa-tree');

    yield MenuItem::section('Pages');
    yield MenuItem::linkTo(PageContentCrudController::class, 'Contenus des pages', 'fa fa-file-lines');
    yield MenuItem::linkTo(BioCrudController::class, 'Biographies', 'fa fa-user');
    yield MenuItem::linkTo(CompanyInfoCrudController::class, 'Sociétés', 'fa fa-industry');

    yield MenuItem::section('Prestations et tarifs');
    yield MenuItem::linkTo(ServiceCrudController::class, 'Prestations / Tarifs', 'fa fa-leaf');
    yield MenuItem::linkTo(ServiceImageCrudController::class, 'Images des prestations', 'fa fa-image');

    yield MenuItem::section('Messages');
    yield MenuItem::linkTo(ContactMessageCrudController::class, 'Messages de contact', 'fa fa-envelope');

    yield MenuItem::section('Administration');
    yield MenuItem::linkTo(UserCrudController::class, 'Utilisateurs', 'fa fa-user-lock');
    yield MenuItem::linkToRoute('Créer un utilisateur', 'fa fa-user-plus', 'admin_create_user');
    yield MenuItem::linkToRoute('Modifier mon mot de passe', 'fa fa-key', 'admin_change_password');
    }
}
