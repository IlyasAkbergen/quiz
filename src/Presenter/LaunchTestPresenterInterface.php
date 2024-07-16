<?php

declare(strict_types=1);

namespace App\Presenter;

use App\Domain\UseCase\LaunchTest\LaunchTestResponseModel;
use Symfony\Component\HttpFoundation\Response;

interface LaunchTestPresenterInterface
{
    public function displayTest(LaunchTestResponseModel $responseModel): Response;
}
