<?php

namespace App\Repository;

use App\Entity\AgentVaccin;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AgentVaccin|null find($id, $lockMode = null, $lockVersion = null)
 * @method AgentVaccin|null findOneBy(array $criteria, array $orderBy = null)
 * @method AgentVaccin[]    findAll()
 * @method AgentVaccin[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AgentVaccinRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AgentVaccin::class);
    }

    // /**
    //  * @return AgentVaccin[] Returns an array of AgentVaccin objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AgentVaccin
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
