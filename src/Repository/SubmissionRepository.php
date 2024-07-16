<?php

declare(strict_types=1);

namespace App\Repository;

use App\Domain\Entity\Submission;
use App\Domain\Repository\SubmissionRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class SubmissionRepository extends ServiceEntityRepository implements SubmissionRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Submission::class);
    }

    public function save(Submission $submission): Submission
    {
        $this->getEntityManager()->persist($submission);

        return $submission;
    }

    public function findSubmission(int $submissionId): ?Submission
    {
        return $this->find($submissionId);
    }
}
