<?php

declare(strict_types=1);

namespace App\Domain\UseCase\LaunchTest;

readonly class LaunchTestResponseModel
{
    public function __construct(
        public array $questions,
    ) {
    }
}
