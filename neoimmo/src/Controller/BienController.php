<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Bien;
use App\Repository\BienRepository;

class BienController extends AbstractController
{
    #[Route('/bien', name: 'app_bien')]
    public function index(BienRepository $bien): Response
    {
        $data = $bien->findAll();
        return $this->render('bien/catalogue.html.twig', [
            'biens' => $data,
        ]);
    }
    #[Route('/bien/fiche/{id}', name: 'app_fiche_bien')]
    public function showFiche(BienRepository $bien, $id): Response
    {
        $data = $bien->find($id);
        return $this->render('bien/ficheBien.html.twig', [
            'bien' => $data,
        ]);
    }
}
