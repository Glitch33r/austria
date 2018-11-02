<?php

namespace BackendBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class StaticContentRepository extends EntityRepository
{
    public function getByPage($pages)
    {
        $query = $this->createQueryBuilder('s')
            ->select('s')
            ->where('s.page IN (:pages)')
            ->setParameter('pages', $pages)
            ->getQuery()
            ->getResult();


        $final = [];
        $i = 0;
        dump($query);

        if ($query) {
            foreach ($query as $res)
            {
                $final[$res->getLinkName()] = $res;
            }
        }
        return $final;
    }
}
