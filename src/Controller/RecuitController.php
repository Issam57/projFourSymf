<?php

namespace App\Controller;

use App\Entity\Recuit;
use App\Form\RecuitType;
use App\Others\CalculDate;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RecuitController extends AbstractController
{
    private $dateRecuit = "";
    private $test;

    /**
     * @Route("/recuit", name="recuit")
     * @IsGranted("ROLE_USER")
     *
     */
    public function index(Request $request, EntityManagerInterface $manager, CalculDate $calculDate): Response
    {

        $recuit = new Recuit();
        $form = $this->createForm(RecuitType::class, $recuit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $result = $form->getData();

            $manager->persist($result);

            //$manager->flush();

            $this->dateRecuit = $request->request->all('recuit')['dateRecuit'];

            $this->test = $request->request->all('recuit')['recuit'];

            //$essai = $form->get('recuit')->getViewData();

            //dd($essai);

        }

        $res = $calculDate->calculDate($this->dateRecuit,$this->test);


        return $this->render('recuit/index.html.twig', [
            'form' => $form->createView(),
            'res' => $res
        ]);
    }
}
