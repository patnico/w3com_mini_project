<?php

namespace App\Repository;

use App\Entity\CustomEquipment;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method CustomEquipment|null find($id, $lockMode = null, $lockVersion = null)
 * @method CustomEquipment|null findOneBy(array $criteria, array $orderBy = null)
 * @method CustomEquipment[]    findAll()
 * @method CustomEquipment[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CustomEquipmentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CustomEquipment::class);
    }
}
