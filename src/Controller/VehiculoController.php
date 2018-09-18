<?php

namespace App\Controller;

use App\Entity\Vehiculo;
use App\Form\VehiculoType;
use App\Repository\VehiculoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/vehiculo")
 */
class VehiculoController extends AbstractController
{
    /**
     * @Route("/", name="vehiculo_index", methods="GET")
     */
    public function index(VehiculoRepository $vehiculoRepository): Response
    {
        return $this->render('vehiculo/index.html.twig', ['vehiculos' => $vehiculoRepository->findAll()]);
    }

    /**
     * @Route("/new", name="vehiculo_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $vehiculo = new Vehiculo();
        $form = $this->createForm(VehiculoType::class, $vehiculo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($vehiculo);
            $em->flush();

            return $this->redirectToRoute('vehiculo_index');
        }

        return $this->render('vehiculo/new.html.twig', [
            'vehiculo' => $vehiculo,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="vehiculo_show", methods="GET")
     */
    public function show(Vehiculo $vehiculo): Response
    {
        return $this->render('vehiculo/show.html.twig', ['vehiculo' => $vehiculo]);
    }

    /**
     * @Route("/{id}/edit", name="vehiculo_edit", methods="GET|POST")
     */
    public function edit(Request $request, Vehiculo $vehiculo): Response
    {
        $form = $this->createForm(VehiculoType::class, $vehiculo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('vehiculo_edit', ['id' => $vehiculo->getId()]);
        }

        return $this->render('vehiculo/edit.html.twig', [
            'vehiculo' => $vehiculo,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="vehiculo_delete", methods="DELETE")
     */
    public function delete(Request $request, Vehiculo $vehiculo): Response
    {
        if ($this->isCsrfTokenValid('delete'.$vehiculo->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($vehiculo);
            $em->flush();
        }

        return $this->redirectToRoute('vehiculo_index');
    }
}
