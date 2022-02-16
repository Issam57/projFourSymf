<?php

namespace App\Controller;

use App\Others\CalculDate;
use App\Repository\ArretRepository;
use App\Repository\FirstRepository;
use App\Repository\SecondRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(FirstRepository $repo1, SecondRepository $repo2, ArretRepository $repo3, CalculDate $calculDate): Response
    {
        $first = $repo1->findAll();
        $second = $repo2->findAll();
        $arret = $repo3->findAll();

        $calculDate = new CalculDate();
        $dateNow = $calculDate->dateNow();


        return $this->render('home/index.html.twig', [
            'firsts' => $first,
            'seconds' => $second,
            'arrets' => $arret,
            'dateNow' => $dateNow


        ]);
    }
}
