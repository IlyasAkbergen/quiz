<?php

declare(strict_types=1);

namespace App\Presenter;

use App\Domain\UseCase\CheckTest\CheckTestResponseModel;
use Symfony\Component\HttpFoundation\Response;

interface CheckTestPresenterInterface
{
    public function displayResult(CheckTestResponseModel $responseModel): Response;
}
