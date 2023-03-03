<?php

namespace App\Controller\Admin;

use App\Entity\Bien;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;

class BienCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Bien::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('titre' , 'Titre de l\'annonce'),
            IntegerField::new('Code_postal' , 'Code Postal')->setNumberFormat('%+06d'),
            IntegerField::new('Numero_de_ladresse', 'Numéro de l\'adresse')->setNumberFormat('%+06d'),
            TextField::new('Nom_de_la_voie' , 'Nom de la voie'),
            IntegerField::new('Prix', 'Prix')->setNumberFormat('%+06d'),
            DateTimeField::new('Date_annonce', 'Date de l\'annonce')->setFormat('MM.dd.yyyy G '),
            ImageField::new('Url_Photo','Url')->setUploadDir('public/asset/images/')->setBasePath('asset/images'),
            TextareaField::new('Contenu','Contenu')->setNumOfRows(10),
            TextField::new('type' , 'Typologie du bien'),
            IntegerField::new('superficie', 'Superficie du bien')->setNumberFormat('%+06d'),
            TextField::new('type_annonce' , 'Type de l\'annonce (vente/location)'),
            BooleanField::new('jardin' , 'Jardin'),
            BooleanField::new('balcon' , 'Balcon'),
            BooleanField::new('parking' , 'Parking'),
        

        ];
    }
    
}
