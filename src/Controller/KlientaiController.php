<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Klientas;
use App\Entity\Naudotojas;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class KlientaiController extends AbstractController
{
    /**
     * @Route("/klientai", name="app_klientai")
     */
    public function index()
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $naudotojas = $this->getUser();

        if($naudotojas->getRoles()[0] == 'ROLE_ADMIN'){
            
            $klientai = $this->getDoctrine()
            ->getRepository(Klientas::class)
            ->findAll();
        }
        else if ($naudotojas->getRoles()[0] == 'ROLE_KLIENTAS'){
            $klientai = $this->getDoctrine()
            ->getRepository(Klientas::class)
            ->findBy(['naudotojo_id' => $naudotojas]);
        }
        return $this->render('klientai/klientai.html.twig', [
            'klientai' => $klientai,
        ]);
    }

        /**
         * @Route("/klientai/profilis/{klientasID}", name="app_klientaiProfilis")
         */
        public function profile($klientasID)
        {
            $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');


            if(in_array('ROLE_ADMIN', $this->getUser()->getRoles()))
                    {

                    $klientas = $this->getDoctrine()
                        ->getRepository(Klientas::class)
                        ->find($klientasID);
                        }
            else if(in_array('ROLE_KLIENTAS', $this->getUser()->getRoles()))
                        {
            $klientas = $this->getDoctrine()->getRepository(Klientas::class)->findOneBy(['naudotojo_id' => $klientasID]);
            }

            
            $klientas = $this->getDoctrine()->getRepository(Klientas::class)->findOneBy(['id' => $klientasID]);
            

            return $this->render('klientai/perziuretiprof.html.twig', [
                'klientas' => $klientas,
            ]);
        }
}
