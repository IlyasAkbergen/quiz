<?php

declare(strict_types=1);

namespace App\Domain\UseCase\CheckTest;

use App\Domain\Entity\Answer;

class CheckTestRequestModel
{
    /**
     * @var Answer[]
     */
    private array $answers;

    public function __construct(
        Answer ...$answers,
    ) {
        $this->answers = $answers;
    }

    public function getAnswers(): array
    {
        return $this->answers;
    }
}
