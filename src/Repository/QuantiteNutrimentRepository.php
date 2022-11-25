<?php

namespace App\Repository;

use App\Entity\QuantiteNutriment;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<QuantiteNutriment>
 *
 * @method QuantiteNutriment|null find($id, $lockMode = null, $lockVersion = null)
 * @method QuantiteNutriment|null findOneBy(array $criteria, array $orderBy = null)
 * @method QuantiteNutriment[]    findAll()
 * @method QuantiteNutriment[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class QuantiteNutrimentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, QuantiteNutriment::class);
    }

    public function add(QuantiteNutriment $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(QuantiteNutriment $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return QuantiteNutriment[] Returns an array of QuantiteNutriment objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('q')
//            ->andWhere('q.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('q.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?QuantiteNutriment
//    {
//        return $this->createQueryBuilder('q')
//            ->andWhere('q.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
