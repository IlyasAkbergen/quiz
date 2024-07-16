<?php

declare(strict_types=1);

namespace App\Controller\Action;

use App\Domain\UseCase\LaunchTest\LaunchTestUseCase;
use App\Presenter\LaunchTestPresenterInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class LaunchTest extends AbstractController
{
    #[Route('/')]
    public function index(
        LaunchTestUseCase $launchTestUseCase,
        LaunchTestPresenterInterface $launchTestPresenter,
    ): Response {
        return $launchTestPresenter->displayTest($launchTestUseCase());
    }
}
