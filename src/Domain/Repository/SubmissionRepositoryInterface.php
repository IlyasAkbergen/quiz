<?php

declare(strict_types=1);

namespace App\Domain\Repository;

use App\Domain\Entity\Submission;

interface SubmissionRepositoryInterface
{
    public function save(Submission $submission): Submission;

    public function findSubmission(int $submissionId): ?Submission;
}
