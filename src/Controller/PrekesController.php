<?php
namespace App\Controller;
use App\Entity\Preke;
use App\Entity\review;
use App\Entity\configur;
use App\Form\PrekesRedaguotiFormType;
use App\Form\PrekesFormType;
use App\Form\reviewFormType;
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
        $config = $this->getDoctrine()->getRepository(configur::class)->find(0);

        return $this->render('prekes/prekes.html.twig', [
        'prekes' => $prekes,
        'conf' => $config,
        ]);
    }

    /**
     * @Route("/prekesDid", name="app_prekesDidejimo")
     */
    public function index1()
    {
        $prekes = $this->getDoctrine()->getRepository(Preke::class)->findAllOrderedByPrice();
        $config = $this->getDoctrine()->getRepository(configur::class)->find(0);

        return $this->render('prekes/prekes.html.twig', [
        'prekes' => $prekes,
        'conf' => $config,
        ]);
    }

    /**
     * @Route("/prekesMaz", name="app_prekesMazejimo")
     */
    public function index2()
    {
        $prekes = $this->getDoctrine()->getRepository(Preke::class)->findAllOrderedByPriceDesc();
        $config = $this->getDoctrine()->getRepository(configur::class)->find(0);

        return $this->render('prekes/prekes.html.twig', [
        'prekes' => $prekes,
        'conf' => $config,
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
             return $this->redirectToRoute('app_prekes');
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

            $preke = $this->getDoctrine()->getRepository(Preke::class)->find($prekesID);
            $form = $this->createForm(PrekesRedaguotiFormType::class, $preke);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid())
                    {
                        $preke = $form->getData();
    
                        $entityManager = $this->getDoctrine()->getManager();
                        $entityManager->persist($preke);
                        $entityManager->flush();
    
                        $this->addFlash('success', 'Prekė paredaguota');
                        return $this->redirectToRoute('app_prekesPlaciau', ['prekesId' => $prekesID]);
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
        $review = $this->getDoctrine()->getRepository(review::class)->findReview($prekesId);
        $config = $this->getDoctrine()->getRepository(configur::class)->find(0);

        $entityManager = $this->getDoctrine()->getManager();
        $conn = $this->getDoctrine()->getManager()->getConnection();

        $sql = "SELECT Count(*) as kiek FROM review WHERE product_id = '$prekesId'";
        $sqli = "SELECT sum(rate) as ivert FROM review WHERE product_id = '$prekesId'";

        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch();
        $kiekis = $row['kiek'];

        $stmti = $conn->prepare($sqli);
        $stmti->execute();
        $rowi = $stmti->fetch();
        if($kiekis != 0)
        {
            $avg = $rowi['ivert'] / $kiekis;
        }
        else{
            $avg = 0;
        }

        return $this->render('prekes/profilis.html.twig', [
            'prekee' => $preke,
            'conf' => $config,
            'reviews' => $review,
            'kiekis' => $kiekis,
            'vidurk' => $avg,
        ]);
    }
   
}