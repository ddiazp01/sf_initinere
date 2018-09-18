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

//    /**
//     * @return Itinerario[] Returns an array of Itinerario objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Itinerario
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
