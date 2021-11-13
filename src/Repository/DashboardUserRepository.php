<?php

namespace App\Repository;

use App\Entity\DashboardUser;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DashboardUser|null find($id, $lockMode = null, $lockVersion = null)
 * @method DashboardUser|null findOneBy(array $criteria, array $orderBy = null)
 * @method DashboardUser[]    findAll()
 * @method DashboardUser[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DashboardUserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DashboardUser::class);
    }
}
