<?php

namespace App\Repository;

use App\Entity\LandingAdvice;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<LandingAdvice>
 */
class LandingAdviceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LandingAdvice::class);
    }

    /**
     * @return LandingAdvice[]
     */
    public function findActiveOrdered(): array
    {
        return $this->findBy(['isActive' => true], ['position' => 'ASC', 'title' => 'ASC']);
    }
}
