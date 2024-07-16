<?php

declare(strict_types=1);

namespace App\Repository;

use App\Domain\Entity\Answer;
use App\Domain\Repository\AnswerRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Answer>
 */
class AnswerRepository extends ServiceEntityRepository implements AnswerRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Answer::class);
    }

    public function save(Answer $answer): Answer
    {
        $this->getEntityManager()->persist($answer);

        return $answer;
    }
}
