<?php

namespace App\Controller\Admin;

use App\Entity\Dossiers;
use App\Entity\Etudiant;
use App\Entity\Tuteur;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;

class DashboardController extends AbstractDashboardController
{
    public function __construct(private AdminUrlGenerator $adminUrlGenerator)
    {
        
    }
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $url = $this->adminUrlGenerator->setController(EtudiantCrudController::class)
        ->generateUrl();

         return $this->redirect($url);
         
        $url = $this->adminUrlGenerator->setController(DossiersCrudController::class)
        ->generateUrl();

         return $this->redirect($url);
         
         $url = $this->adminUrlGenerator->setController(TuteurCrudController::class)
        ->generateUrl();

         return $this->redirect($url);
         
         

    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Gestion Inscriptions');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::section('Administration', 'fa fa-home');

        yield MenuItem::subMenu('Actions', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Inscriptions', 'fa fa-eye', Etudiant::class),
            MenuItem::linkToCrud('Dossiers', 'fa fa-eye', Dossiers::class),
            MenuItem::linkToCrud('Tuteurs', 'fa fa-eye', Tuteur::class)
        ]);
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }

    
}
