<?php

declare(strict_types=1);

namespace App\Repository;

use App\Domain\Entity\Test;
use App\Domain\Repository\TestRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class TestRepository extends ServiceEntityRepository implements TestRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Test::class);
    }

    public function save(Test $test): Test
    {
        $this->_em->persist($test);

        return $test;
    }
}
