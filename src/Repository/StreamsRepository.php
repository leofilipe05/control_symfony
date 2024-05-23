<?php

namespace App\Repository;

use App\Entity\Streams;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Streams>
 */
class StreamsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Streams::class);
    }

    public function findByStartDate(\DateTimeInterface $startDate): array
{
    return $this->createQueryBuilder('s')
        ->andWhere('s.startDate BETWEEN :start AND :end')
        ->setParameter('start', $startDate)
        ->setParameter('end', (clone $startDate)->modify('+1 day'))
        ->getQuery()
        ->getResult();
}

//    /**
//     * @return Streams[] Returns an array of Streams objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Streams
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
