<?php

declare(strict_types=1);

namespace App\Factory;

use App\Domain\Entity\Answer;

class AnswerFactory
{
    public static function create(array $data): Answer
    {
        $answer = new Answer();
        $answer->setQuestionId($data['question_id']);
        $answer->setAnswers($data['answers']);

        return $answer;
    }
}
