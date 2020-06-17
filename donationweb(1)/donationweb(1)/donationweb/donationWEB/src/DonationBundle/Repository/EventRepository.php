<?php

namespace DonationBundle\Repository;
use DonationBundle\Entity\Event;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class EventRepository extends ServiceEntityRepository {
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Event::class);
    }
    public function findByQuery($query)

    {

        return $this->createQueryBuilder('e')->andWhere('e.nameEv LIKE :query')->setParameter('query', '%'.$query.'%')->getQuery()->getResult();
    }

}
