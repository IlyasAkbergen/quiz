<?php

declare(strict_types=1);

namespace App\Presenter\Web;

use App\Domain\Entity\Submission;
use App\Domain\Service\AnswerChecker;
use App\Presenter\ShowSubmissionPresenterInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class ShowSubmissionPresenter extends AbstractController implements ShowSubmissionPresenterInterface
{
    public function __construct(
        private readonly AnswerChecker $answerChecker,
    ) {
    }

    public function showResult(Submission $submission): Response
    {
        $correctAnswers = [];
        $wrongAnswers = [];
        foreach ($submission->getAnswers() as $answer) {
            if ($this->answerChecker->isCorrect($answer)) {
                $correctAnswers[] = $answer;
            } else {
                $wrongAnswers[] = $answer;
            }
        }

        return $this->render('submission/show.html.twig', [
            'correct_answers' => $correctAnswers,
            'wrong_answers' => $wrongAnswers,
        ]);
    }

    public function showError(string $message): Response
    {
        return $this->render('error.html.twig', [
            'message' => $message,
        ]);
    }
}
