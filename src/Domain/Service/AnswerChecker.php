<?php

declare(strict_types=1);

namespace App\Domain\Service;

use App\Domain\Entity\Answer;

class AnswerChecker
{
    public function isCorrect(Answer $answer): bool
    {
        if ($answer->getAnswers() === []) {
            return false;
        }

        $incorrectItems = array_filter(
            $answer->getAnswers(),
            static fn (string|int $item) => !in_array($item, $answer->getQuestion()->getAnswers()),
        );

        return $incorrectItems === [];
    }
}
