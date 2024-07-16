<?php

declare(strict_types=1);

namespace App\Domain\UseCase;

use App\Domain\Entity\Submission;
use App\Domain\Exception\DomainException;
use App\Domain\Repository\SubmissionRepositoryInterface;

readonly class GetSubmissionUseCase
{
    public function __construct(
        public SubmissionRepositoryInterface $submissionRepository,
    ) {
    }

    /**
     * @throws DomainException
     */
    public function __invoke(int $submissionId): Submission
    {
        $submission = $this->submissionRepository->find($submissionId);

        if (!$submission instanceof Submission) {
            throw new DomainException('Submission not found');
        }

        return $submission;
    }
}
