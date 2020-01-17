<?php
namespace App\Controller;
use App\Entity\Preke;
use App\Form\PrekesRedaguotiFormType;
use App\Form\PrekesFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
class PrekesController extends AbstractController
{
    /**
     * @Route("/prekes", name="app_prekes")
     */
    public function index()
    {
        $prekes = $this->getDoctrine()->getRepository(Preke::class)->findAll();
        return $this->render('prekes/prekes.html.twig', [
        'prekes' => $prekes
        ]);
    }
    /**
     * @Route("/prekes/prideti", name="app_prekePrideti")
     */
    public function add(Request $request)
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        $form = $this->createForm(PrekesFormType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $preke = $form->getData();
             $entityManager = $this->getDoctrine()->getManager();
             $entityManager->persist($preke);
             $entityManager->flush();
             $this->addFlash('success', 'Prekė pridėta');
             return $this->redirectToRoute('app_preke');
        }
        return $this->render('prekes/forma.html.twig', [
            'purpose' => 'Pridėti',
            'object' => 'prekę',
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/prekes/redaguoti/{prekesID}", name="app_prekeRedaguoti")
     */
    public function edit($prekesID, Request $request)
    {
            $this->denyAccessUnlessGranted('ROLE_ADMIN');
            $preke = $this->getDoctrine()
                ->getRepository(Preke::class)
                ->find($prekesID);
    
            $form = $this->createForm(PrekesRedaguotiFormType::class, $preke);
            $form->handleRequest($request);
    
    
            if ($form->isSubmitted() && $form->isValid())
                    {
                        $preke = $form->getData();
    
                        $entityManager = $this->getDoctrine()->getManager();
                        $entityManager->persist($preke);
                        $entityManager->flush();
    
                        $this->addFlash('success', 'Prekė paredaguota');
                        return $this->redirectToRoute('app_prekesPlaciau', ['prekesID' => $prekesID]);
                    }
    
                    return $this->render('prekes/forma.html.twig', [
                        'purpose' => 'Redaguoti',
                        'object' => 'prekę',
                        'form' => $form->createView(),
                    ]);
                
    }
    /**
     * @Route("/prekes/istrinti/{prekesID}", name="app_prekesIstrinti")
     */
    public function delete($prekesID)
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        $preke = $this->getDoctrine()->getRepository(Preke::class)->find($prekesID);

        if ($preke != null)
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($preke);
            $entityManager->flush();

            $this->addFlash('success', 'Prekė ištrinta');
            return $this->redirectToRoute('app_prekes');
        }

        return $this->render('prekes/prekes.html.twig', [

        ]);
    }

        /**
     * @Route("/prekes/placiau/{prekesId}", name="app_prekesPlaciau")
     */
    public function profile($prekesId)
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        $preke = $this->getDoctrine()->getRepository(Preke::class)->find($prekesId);

        $entityManager = $this->getDoctrine()->getManager();
        $conn = $this->getDoctrine()->getManager()->getConnection();

        return $this->render('prekes/profilis.html.twig', [
            'prekee' => $preke,
        ]);
    }

   
}