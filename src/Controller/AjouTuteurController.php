<?php

namespace App\Controller;

use App\Entity\Tuteur;
use App\Form\TuteurType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;

class AjouTuteurController extends AbstractController
{
    #[Route('/ajout', name: 'app_ajou_tuteur')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {   
        
        $tuteur = new Tuteur();
        $form = $this->createForm(TuteurType::class, $tuteur);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $entityManager->persist($tuteur);
            $entityManager->flush();
        }
        return $this->render('ajou_tuteur/tuteur.html.twig', [
            'controller_name' => 'AjouTuteurController',
        ]);
    }
}
