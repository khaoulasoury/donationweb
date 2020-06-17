<?php


namespace DonationBundle\Repository;

use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityRepository;
use DonationBundle\Entity\Action;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

class ActionRepository extends EntityRepository
{
    public function fbQuery($query)
    {

        return $this->createQueryBuilder('e')->andWhere('e.nameAction LIKE :query')->setParameter('query', '%'.$query.'%')->getQuery()->getResult();
    }

}