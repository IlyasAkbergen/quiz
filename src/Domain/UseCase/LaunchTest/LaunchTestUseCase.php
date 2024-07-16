<?php

declare(strict_types=1);

namespace App\Domain\UseCase\LaunchTest;

use App\Domain\Service\TestService;

readonly class LaunchTestUseCase
{
    public function __construct(
        private TestService $testService,
    ) {
    }

    public function __invoke(): LaunchTestResponseModel
    {
        return new LaunchTestResponseModel(
            $this->testService->getQuestions(),
        );
    }
}
