<?php

namespace App\Controller;

use App\Repository\UserRepository;
use App\Repository\ItinerarioRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;


class AjaxController extends AbstractController
{
    /**
     * @Route("/itinerario/{id_origen}/{id_destino}", name="ajax-origen-destino")
     */
    public function ajaxOrigenDestino($id_origen, $id_destino, ItinerarioRepository $itinerarioRepository)
    {
        $encoder = new JsonEncoder();
        $normalizer = new DateTimeNormalizer('H:i');
        
        $serializer = new Serializer(array($normalizer), array($encoder));

        $itinerarios = $itinerarioRepository->findByOrigenDestino($id_origen, $id_destino);

        $jsonItinerarios = $serializer->serialize($itinerarios, 'json');

        return new Response($jsonItinerarios);
    }

    /**
     * @Route("/usuario/{id_usuario}/itinerarios/", name="ajax-usuario")
     */
    public function ajaxUsuario($id_usuario, UserRepository $userRepository)
    {
        $encoder = new JsonEncoder();
        $normalizer = new DateTimeNormalizer('H:i');


        $itinerarios = $userRepository->findByUsuario($id_usuario);

        $serializer = new Serializer(array($normalizer), array($encoder));

        $jsonItinerarios = $serializer->serialize($itinerarios, 'json');

        return new Response($jsonItinerarios);

    }
}
