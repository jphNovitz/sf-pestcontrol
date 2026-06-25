<?php

namespace App\Repository;

use App\Entity\InterventionZone;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<InterventionZone>
 */
class InterventionZoneRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InterventionZone::class);
    }

    /**
     * @return InterventionZone[]
     */
    public function findActiveOrdered(): array
    {
        return $this->findBy(['isActive' => true], ['position' => 'ASC', 'name' => 'ASC']);
    }
}
