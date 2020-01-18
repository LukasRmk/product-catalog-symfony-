<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Form\reviewFormType;
use App\Entity\review;

class reviewController extends AbstractController
{
    /**
     * @Route("/review", name="app_atsiliepimas")
     */
    public function index(Request $request)
    {   
        $request->query->get('prekesID');

        $form = $this->createForm(reviewFormType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
             $review = $form->getData();
             $entityManager = $this->getDoctrine()->getManager();
             $entityManager->persist($review);
             $entityManager->flush();
             $this->addFlash('success', 'Atsiliepimas pridėtas');
             return $this->redirectToRoute('app_prekes');
        }
        return $this->render('prekes/forma.html.twig', [
            'purpose' => 'Palikti',
            'object' => 'atsiliepimą',
            'form' => $form->createView(),
        ]);
    }
}
