<?php

declare(strict_types=1);

namespace App\Domain\UseCase\SubmitTest;

use App\Domain\Entity\Submission;

class SubmitTestResponseModel
{
    public function __construct(
        public Submission $submission,
    ) {
    }
}
