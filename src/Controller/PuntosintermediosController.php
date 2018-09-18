<?php

namespace App\Controller;

use App\Entity\Puntosintermedios;
use App\Form\PuntosintermediosType;
use App\Repository\PuntosintermediosRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/puntosintermedios")
 */
class PuntosintermediosController extends AbstractController
{
    /**
     * @Route("/", name="puntosintermedios_index", methods="GET")
     */
    public function index(PuntosintermediosRepository $puntosintermediosRepository): Response
    {
        return $this->render('puntosintermedios/index.html.twig', ['puntosintermedios' => $puntosintermediosRepository->findAll()]);
    }

    /**
     * @Route("/new", name="puntosintermedios_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $puntosintermedio = new Puntosintermedios();
        $form = $this->createForm(PuntosintermediosType::class, $puntosintermedio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($puntosintermedio);
            $em->flush();

            return $this->redirectToRoute('puntosintermedios_index');
        }

        return $this->render('puntosintermedios/new.html.twig', [
            'puntosintermedio' => $puntosintermedio,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="puntosintermedios_show", methods="GET")
     */
    public function show(Puntosintermedios $puntosintermedio): Response
    {
        return $this->render('puntosintermedios/show.html.twig', ['puntosintermedio' => $puntosintermedio]);
    }

    /**
     * @Route("/{id}/edit", name="puntosintermedios_edit", methods="GET|POST")
     */
    public function edit(Request $request, Puntosintermedios $puntosintermedio): Response
    {
        $form = $this->createForm(PuntosintermediosType::class, $puntosintermedio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('puntosintermedios_edit', ['id' => $puntosintermedio->getId()]);
        }

        return $this->render('puntosintermedios/edit.html.twig', [
            'puntosintermedio' => $puntosintermedio,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="puntosintermedios_delete", methods="DELETE")
     */
    public function delete(Request $request, Puntosintermedios $puntosintermedio): Response
    {
        if ($this->isCsrfTokenValid('delete'.$puntosintermedio->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($puntosintermedio);
            $em->flush();
        }

        return $this->redirectToRoute('puntosintermedios_index');
    }
}
