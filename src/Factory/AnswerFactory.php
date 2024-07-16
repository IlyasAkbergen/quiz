<?php

declare(strict_types=1);

namespace App\Factory;

use App\Domain\Entity\Answer;

class AnswerFactory
{
    public static function create(array $data): Answer
    {
        $answer = new Answer();
        $answer->setQuestion($data['question']);
        $answer->setAnswers($data['answers']);
        $answer->setSubmission($data['submission']);

        return $answer;
    }
}
