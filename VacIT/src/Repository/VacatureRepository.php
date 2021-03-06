<?php

namespace App\Repository;

use App\Entity\Vacature;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Vacature|null find($id, $lockMode = null, $lockVersion = null)
 * @method Vacature|null findOneBy(array $criteria, array $orderBy = null)
 * @method Vacature[]    findAll()
 * @method Vacature[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VacatureRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Vacature::class);
    }
    
    public function getVacature($id)
    {
        $vacature = $this->find(['id' => $id]);
        return(array("vacature" => $vacature));
    }

    public function getVacatureWerkgever($werkgever_id)
    {
        $vacatures_werkgever = $this->findBy($werkgever_id);
        return($vacatures_werkgever);
    }

    public function getLastVacatures($num)
    {

        return $this->createQueryBuilder('e')->
            orderBy('e.datum', 'DESC')->
            setMaxResults($num)->
            getQuery()->
            getResult();
    }

    public function getAllVacatures()
    {
        $vacatures = $this->findAll();
        return($vacatures);
    }

    // /**
    //  * @return Vacature[] Returns an array of Vacature objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Vacature
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
