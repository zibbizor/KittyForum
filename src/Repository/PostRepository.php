<?php

namespace Repository;
use Doctrine\ORM\EntityRepository;

class PostRepository extends EntityRepository
{
  public function searchSubject($subject)
  {
    return $this
        ->createQueryBuilder('p')
        ->where('p.subject LIKE :word')
        ->orderBy('p.date', 'DESC')
        ->setParameter('word', '%'.$subject.'%')
        ->getQuery()
        ->getResult()
    ;
  }
}

 ?>
