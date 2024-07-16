<?php

declare(strict_types=1);

namespace App\Presenter;

use App\Domain\Entity\Submission;
use Symfony\Component\HttpFoundation\Response;

interface SubmitTestPresenterInterface
{
    public function showResult(Submission $submission): Response;
}
