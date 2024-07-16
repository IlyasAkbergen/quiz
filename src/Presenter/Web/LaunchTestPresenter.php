<?php

declare(strict_types=1);

namespace App\Presenter\Web;

use App\Domain\UseCase\LaunchTest\LaunchTestResponseModel;
use App\Presenter\LaunchTestPresenterInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class LaunchTestPresenter extends AbstractController implements LaunchTestPresenterInterface
{
    public function displayTest(LaunchTestResponseModel $responseModel): Response
    {
        return $this->render('launch_test.html.twig', [
            'questions' => $responseModel->questions,
        ]);
    }
}
