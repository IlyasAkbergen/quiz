<?php

declare(strict_types=1);

namespace App\Domain\UseCase\SubmitTest;

class SubmitTestRequestModel
{
    private array $answers = [];

    public function addAnswer(int $questionId, int|string $answer): void
    {
        $this->answers[$questionId][] = $answer;
    }

    public function getAnswers(): array
    {
        return $this->answers;
    }
}
