<?php

namespace BackendBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class RoomClassRepository extends EntityRepository
{
    public function getPrevious($id)
    {
        $qb = $this->createQueryBuilder('u')
            ->select('u')

            // Filter users.
            ->where('u.id < :id')
            ->setParameter('id', $id)

            // Order by id.
//            ->orderBy('u.id', 'DESC')

            // Get the first record.
//            ->setFirstResult(0)
            ->setMaxResults(1)
        ;

        return $qb->getQuery()->getOneOrNullResult();
    }

    public function getNext($id)
    {
        $qb = $this->createQueryBuilder('u')
            ->select('u')

            ->where('u.id > :id')
            ->setParameter('id', $id)

//            ->orderBy('u.id', 'ASC')

//            ->setFirstResult(0)
            ->setMaxResults(1)
        ;

        return $qb->getQuery()->getOneOrNullResult();
    }
}
