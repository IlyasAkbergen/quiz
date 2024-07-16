<?php

declare(strict_types=1);

namespace App\Presenter\Web;

use App\Domain\UseCase\CheckTest\CheckTestResponseModel;
use App\Presenter\CheckTestPresenterInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class CheckTestPresenter extends AbstractController implements CheckTestPresenterInterface
{
    public function displayResult(CheckTestResponseModel $responseModel): Response
    {
        // TODO: Implement displayResult() method.
    }
}
