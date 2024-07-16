<?php

declare(strict_types=1);

namespace App\Domain\Repository;

use App\Domain\Entity\Test;

interface TestRepositoryInterface
{
    public function save(Test $test): Test;
}
