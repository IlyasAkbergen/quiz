<?php

declare(strict_types=1);

namespace App\Controller\Action;

use App\Domain\UseCase\SubmitTest\SubmitTestRequestModel;
use App\Domain\UseCase\SubmitTest\SubmitTestUseCase;
use App\Presenter\SubmitTestPresenterInterface;
use App\Resolver\AnswerInputResolver;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class SubmitTestAction extends AbstractController
{
    #[Route('/submit-test', methods: ['POST'])]
    public function index(
        Request $request,
        SubmitTestUseCase $useCase,
        SubmitTestPresenterInterface $presenter,
        EntityManagerInterface $entityManager,
        AnswerInputResolver $answerInputResolver,
    ): Response {
        $requestModel = new SubmitTestRequestModel();
        foreach ($request->request->all() as $key => $answer) {
            [$questionId, $rawAnswer] = $answerInputResolver->resolve($key);
            $requestModel->addAnswer($questionId, $rawAnswer);
        }

        $responseModel = $useCase($requestModel);
        $entityManager->flush();

        return $presenter->showResult($responseModel->submission);
    }
}
