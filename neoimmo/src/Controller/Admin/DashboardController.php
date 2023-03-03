<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Filter\EntityFilter;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use App\Entity\Bien;
use App\Entity\User;
use App\Entity\Article;




class DashboardController extends AbstractDashboardController
{
    #[IsGranted('ROLE_ADMIN')]
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {

        return $this->render('admin/dashboard.html.twig', ['_username'=> ''] );


         // Option 1. You can make your dashboard redirect to some common page of your backend
        // $routeBuilder = $this->container->get(AdminUrlGenerator::class);
        // $url = $routeBuilder->setController(UserCrudController::class)->generateUrl();

        // return $this->redirect($url);

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        
        // if (is_granted('ROLE_ADMIN')) {
        //     return $this->redirect('/admin');
        // }else{
        //     return $this-redirect('/login');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        
        // return $this->render('some/path/my-dashboard.html.twig');
    }
    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoRoute('Retour au site', 'fas fa-home', 'app_login');
        yield MenuItem::linkToCrud('Bien', 'fas fa-map-marker-alt', Bien::class);
        // MENU AJOUT ADMIN COMMENTE
        // yield MenuItem::linkToCrud('Admin', 'fas fa-comments', User::class);
        yield MenuItem::linkToCrud('Article', 'fas fa-comments', Article::class);
    }


public function configureDashboard(): Dashboard
{
    return Dashboard::new()
        ->setTitle('Neoimmo - Admin')
        ->renderContentMaximized();
}


public function configureField(): Dashboard
{
    return Dashboard::new()
        ->setTitle('Neoimmo - Admin')
        ->renderContentMaximized();
}


// public function __toString(){
//     return $this->name;
// }
}   
    

    
//     }
// }
