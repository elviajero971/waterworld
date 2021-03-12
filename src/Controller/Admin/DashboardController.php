<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Entity\Booking;
use App\Entity\Park;
use App\Entity\Attraction;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('My User App');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('User', 'fas fa-user', User::class);
        yield MenuItem::linkToCrud('Attraction', 'fas fa-gamepad', Attraction::class);
        yield MenuItem::linkToCrud('Park', 'fas fa-parachute-box', Park::class);
        yield MenuItem::linkToCrud('Booking', 'fas fa-list', Booking::class);

    }
}
