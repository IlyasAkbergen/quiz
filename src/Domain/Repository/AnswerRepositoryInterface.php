<?php

declare(strict_types=1);

namespace App\Domain\Repository;

use App\Domain\Entity\Answer;

interface AnswerRepositoryInterface
{

    public function save(Answer $answer): Answer;
}
