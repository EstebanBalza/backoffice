<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\FormType; 

class ContactFormController extends AbstractController
{

    #[Route('/contact/form', name: 'app_contact_form')]
 public function index(): Response
 {
 $form = $this->createForm(FormType::class);
 return $this->render('Form/contactForm.html.twig', [
 'form' => $form->createView()
 ]);
 }
}


