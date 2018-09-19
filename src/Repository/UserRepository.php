<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, User::class);
    }

    public function findByUsuario($id_usuario)
    {
        return $this->createQueryBuilder('u')
            ->innerJoin('u.itinerarios','i')
            ->innerJoin('i.origen','o')
            ->innerJoin('i.destino','d')           
            ->where('u.id = :usuarioID')
            ->setParameters([
                'usuarioID' => $id_usuario,
            ])
            ->select('u.nombre, o.nombre as origen, d.nombre as destino, i.horasalida, i.horavuelta, i.diasemana')
            ->groupBy('i.id')
            ->getQuery()
            ->getResult()
        ;
    }
}
