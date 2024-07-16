<?php

declare(strict_types=1);

namespace App\Domain\UseCase\CheckTest;

class CheckTestResponseModel
{
    public function __construct(
        public array $userAnswers,
    ) {
    }
}
