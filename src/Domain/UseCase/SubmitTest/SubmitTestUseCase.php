<?php

declare(strict_types=1);

namespace App\Domain\UseCase\SubmitTest;

use App\Domain\Entity\Question;
use App\Domain\Entity\Submission;
use App\Domain\Repository\AnswerRepositoryInterface;
use App\Domain\Repository\QuestionRepositoryInterface;
use App\Domain\Repository\SubmissionRepositoryInterface;
use App\Factory\AnswerFactory;

readonly class SubmitTestUseCase
{
    public function __construct(
        private SubmissionRepositoryInterface $submissionRepository,
        private AnswerRepositoryInterface $answerRepository,
        private QuestionRepositoryInterface $questionRepository,
    ) {
    }

    public function __invoke(SubmitTestRequestModel $requestModel): SubmitTestResponseModel
    {
        $questions = [];
        foreach ($this->questionRepository->all() as $question) {
            $questions[$question->getId()] = $question;
        }

        $submission = new Submission();
        $submittedAnswers = [];
        foreach ($requestModel->getAnswers() as $questionId => $answers) {
            $submittedAnswers[$questionId] = $answers;
        }
        foreach ($questions as $questionId => $question) {
            $answer = AnswerFactory::create([
                'question' => $question,
                'answers' => $submittedAnswers[$questionId] ?? [],
                'submission' => $submission,
            ]);
            $answer = $this->answerRepository->save($answer);
            $submission->addAnswer($answer);
        }

        $this->submissionRepository->save($submission);

        return new SubmitTestResponseModel($submission);
    }
}
