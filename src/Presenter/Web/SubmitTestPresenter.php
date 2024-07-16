<?php

declare(strict_types=1);

namespace App\Presenter\Web;

use App\Domain\Entity\Submission;
use App\Presenter\SubmitTestPresenterInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

class SubmitTestPresenter implements SubmitTestPresenterInterface
{
    public function showResult(Submission $submission): Response
    {
        return new RedirectResponse('/submission/' . $submission->getId());
    }
}
