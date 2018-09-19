<?php

namespace App\Repository;

use App\Entity\Itinerario;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Itinerario|null find($id, $lockMode = null, $lockVersion = null)
 * @method Itinerario|null findOneBy(array $criteria, array $orderBy = null)
 * @method Itinerario[]    findAll()
 * @method Itinerario[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ItinerarioRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Itinerario::class);
    }

    public function findByOrigenDestino($id_origen, $id_destino)
    {
        return $this->createQueryBuilder('i')
            ->innerJoin('i.origen','o')
            ->innerJoin('i.destino','d')
            ->where('i.origen = :origenID')
            ->andWhere('i.destino = :destinoID')
            ->setParameters([
                'origenID' => $id_origen,
                'destinoID' => $id_destino
            ])
            ->select('o.nombre as origen, d.nombre as destino, i.horasalida, i.horavuelta, i.diasemana')
            ->groupBy('i.id')
            ->getQuery()
            ->getResult()
        ;
    }

}
