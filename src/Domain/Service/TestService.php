<?php

declare(strict_types=1);

namespace App\Domain\Service;

use App\Domain\Repository\QuestionRepositoryInterface;

readonly class TestService
{
    public function __construct(
        private QuestionRepositoryInterface $questionRepository,
    ) {
    }

    public function getQuestions(): array
    {
        $questions = $this->questionRepository->all();

        shuffle($questions);

        return $questions;
    }
}
