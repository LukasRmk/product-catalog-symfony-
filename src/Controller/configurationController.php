<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Form\configFormType;
use App\Entity\configuration;

class configurationController extends AbstractController
{
    /**
     * @Route("/config", name="app_config")
     */
    public function index(Request $request)
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        $config = $this->getDoctrine()->getRepository(configuration::class)->find(0);
        $form = $this->createForm(configFormType::class, $config);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
                {
                    $config = $form->getData();

                    $entityManager = $this->getDoctrine()->getManager();
                    $entityManager->persist($config);
                    $entityManager->flush();

                    $this->addFlash('success', 'Konfiguracija paredaguota');
                    return $this->redirectToRoute('app_config');
                }

                return $this->render('configuration/config.html.twig', [
                    'purpose' => 'Redaguoti',
                    'object' => 'konfiguracija',
                    'form' => $form->createView(),
                ]);
            
    }
}
