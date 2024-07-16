<?php

declare(strict_types=1);

namespace App\Repository;

use App\Domain\Entity\Question;
use App\Domain\Repository\QuestionRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Question>
 */
class QuestionRepository extends ServiceEntityRepository implements QuestionRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Question::class);
    }

    public function all(): array
    {
        return $this->findAll();
    }
}
