<?php

declare(strict_types=1);

namespace App\Controller\Action;

use App\Domain\Exception\DomainException;
use App\Domain\UseCase\GetSubmissionUseCase;
use App\Presenter\ShowSubmissionPresenterInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ShowSubmissionAction extends AbstractController
{
    #[Route('/submission/{id}', methods: ['GET'])]
    public function index(
        int $id,
        GetSubmissionUseCase $getSubmissionUseCase,
        ShowSubmissionPresenterInterface $showSubmissionPresenter,
    ): Response {
        try {
            $submission = $getSubmissionUseCase($id);
        } catch (DomainException $e) {
            return $showSubmissionPresenter->showError($e->getMessage());
        }

        return $showSubmissionPresenter->showResult($submission);
    }
}
