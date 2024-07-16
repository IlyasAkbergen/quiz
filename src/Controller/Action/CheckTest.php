<?php

declare(strict_types=1);

namespace App\Controller\Action;

use App\Domain\Entity\Test;
use App\Domain\Repository\TestRepositoryInterface;
use App\Domain\UseCase\CheckTest\CheckTestUseCase;
use App\Factory\AnswerFactory;
use App\Presenter\CheckTestPresenterInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CheckTest extends AbstractController
{
    #[Route('/check-test', methods: ['POST'])]
    public function index(
        Request $request,
        CheckTestUseCase $useCase,
        CheckTestPresenterInterface $presenter,
        EntityManagerInterface $entityManager,
        TestRepositoryInterface $testRepository,
        AnswerResolver $answerResolver,
    ): Response {

        // todo move all to use case
        $test = $testRepository->save(new Test());
        $rawAnswers = [];
        foreach ($request->request->all() as $key => $answer) {
            [$questionId, $rawAnswers] = $answerResolver->resolve($key);
            AnswerFactory::create([
                'question_id' => $questionId,
                'answers' => $answer,
            ]);
        }

        $responseModel = $useCase();
        $entityManager->flush();

        return $presenter->displayResult($responseModel);
    }
}
