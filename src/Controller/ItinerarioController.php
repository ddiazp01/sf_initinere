<?php

namespace App\Controller;

use App\Entity\Itinerario;
use App\Form\ItinerarioType;
use App\Repository\ItinerarioRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/itinerario")
 */
class ItinerarioController extends AbstractController
{
    /**
     * @Route("/", name="itinerario_index", methods="GET")
     */
    public function index(ItinerarioRepository $itinerarioRepository): Response
    {
        return $this->render('itinerario/index.html.twig', ['itinerarios' => $itinerarioRepository->findAll()]);
    }

    /**
     * @Route("/new", name="itinerario_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $itinerario = new Itinerario();
        $form = $this->createForm(ItinerarioType::class, $itinerario);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($itinerario);
            $em->flush();

            return $this->redirectToRoute('itinerario_index');
        }

        return $this->render('itinerario/new.html.twig', [
            'itinerario' => $itinerario,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="itinerario_show", methods="GET")
     */
    public function show(Itinerario $itinerario): Response
    {
        return $this->render('itinerario/show.html.twig', ['itinerario' => $itinerario]);
    }

    /**
     * @Route("/{id}/edit", name="itinerario_edit", methods="GET|POST")
     */
    public function edit(Request $request, Itinerario $itinerario): Response
    {
        $form = $this->createForm(ItinerarioType::class, $itinerario);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('itinerario_edit', ['id' => $itinerario->getId()]);
        }

        return $this->render('itinerario/edit.html.twig', [
            'itinerario' => $itinerario,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="itinerario_delete", methods="DELETE")
     */
    public function delete(Request $request, Itinerario $itinerario): Response
    {
        if ($this->isCsrfTokenValid('delete'.$itinerario->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($itinerario);
            $em->flush();
        }

        return $this->redirectToRoute('itinerario_index');
    }
}
