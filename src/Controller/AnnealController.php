<?php

namespace App\Controller;

use App\Entity\Arret;
use App\Entity\First;
use App\Entity\Second;
use App\Form\ArretType;
use App\Form\FirstType;
use App\Form\SecondType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AnnealController extends AbstractController
{
    /**
     * @Route("/first", name="first")
     */
    public function first(Request $request, EntityManagerInterface $manager): Response
    {
        $first = new First();
        $form = $this->createForm(FirstType::class, $first);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $first = $form->getData();

            $manager->persist($first);

            $manager->flush();

            $this->addFlash(
                'success',
                "Le <strong>four {$first->getFour()}</strong> a bien été enregistré"
            );

            return $this->redirectToRoute('home');
        }

        return $this->render('anneal/first.html.twig', [
            "form" => $form->createView()
        ]);
    }

    /**
     * @Route("/second", name="second")
     */
    public function second(Request $request, EntityManagerInterface $manager): Response
    {
        $second = new Second();
        $form = $this->createForm(SecondType::class, $second);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $second = $form->getData();

            $manager->persist($second);

            $manager->flush();

            $this->addFlash(
                'success',
                "Le <strong>four {$second->getFour()}</strong> a bien été enregistré"
            );

            return $this->redirectToRoute('home');
        }

        return $this->render('anneal/second.html.twig', [
            "form" => $form->createView()
        ]);
    }

    /**
     * @Route("/arret", name="arret")
     */
    public function arret(Request $request, EntityManagerInterface $manager): Response
    {
        $arret = new Arret();
        $form = $this->createForm(ArretType::class, $arret);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $arret = $form->getData();

            $manager->persist($arret);

            $manager->flush();

            $this->addFlash(
                'success',
                "Le <strong>four {$arret->getFour()}</strong> a bien été enregistré"
            );

            return $this->redirectToRoute('home');
        }


        return $this->render('anneal/arret.html.twig', [
            "form" => $form->createView()
        ]);
    }

    /**
    * @Route("/delete_first/{id}", name="delete_first")
     */
    public function deleteFirst(EntityManagerInterface $manager, First $first) {
        $manager->remove($first);
        $manager->flush();

        $this->addFlash(
            'danger',
            "Le <strong>four {$first->getFour()}</strong> a bien été supprimé"
        );

        return $this->redirectToRoute('home');
    }

    /**
     * @Route("/delete_second/{id}", name="delete_second")
     */
    public function deleteSecond(EntityManagerInterface $manager, Second $second) {
        $manager->remove($second);
        $manager->flush();

        $this->addFlash(
            'danger',
            "Le <strong>four {$second->getFour()}</strong> a bien été supprimé"
        );

        return $this->redirectToRoute('home');
    }

    /**
     * @Route("/delete_arret/{id}", name="delete_arret")
     */
    public function deleteArret(EntityManagerInterface $manager, Arret $arret) {
        $manager->remove($arret);
        $manager->flush();

        $this->addFlash(
            'danger',
            "Le <strong>four {$arret->getFour()}</strong> a bien été supprimé"
        );

        return $this->redirectToRoute('home');
    }


    /**
    *@Route("/edit_first/{id}", name="edit_first")
     */
    public function editFirst(Request $request, EntityManagerInterface $manager, First $first) {

        $form = $this->createForm(FirstType::class, $first);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $first = $form->getData();

            $manager->flush();

            $this->addFlash(
                'success',
                "Le <strong>four {$first->getFour()}</strong> a bien été modifié"
            );

            return $this->redirectToRoute('home');
        }

        return $this->render('anneal/first.html.twig', [
            "form" => $form->createView()
        ]);
    }
    /**
     *@Route("/edit_second/{id}", name="edit_second")
     */
    public function editSecond(Request $request, EntityManagerInterface $manager, Second $second) {

        $form = $this->createForm(SecondType::class, $second);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $second = $form->getData();

            $manager->flush();

            $this->addFlash(
                'success',
                "Le <strong>four {$second->getFour()}</strong> a bien été modifié"
            );

            return $this->redirectToRoute('home');
        }

        return $this->render('anneal/second.html.twig', [
            "form" => $form->createView()
        ]);
    }

    /**
     *@Route("/edit_arret/{id}", name="edit_arret")
     */
    public function editArret(Request $request, EntityManagerInterface $manager, Arret $arret) {

        $form = $this->createForm(ArretType::class, $arret);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $arret = $form->getData();

            $manager->flush();

            $this->addFlash(
                'success',
                "Le <strong>four {$arret->getFour()}</strong> a bien été modifié"
            );

            return $this->redirectToRoute('home');
        }

        return $this->render('anneal/arret.html.twig', [
            "form" => $form->createView()
        ]);
    }


}
