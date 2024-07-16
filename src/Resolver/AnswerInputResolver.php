<?php

declare(strict_types=1);

namespace App\Resolver;

class AnswerInputResolver
{
    /**
     * @return array{int, int|string}
     */
    public function resolve(string $key): array
    {
        $parts = explode('-', $key);

        if (count($parts) !== 2) {
            throw new \InvalidArgumentException("Invalid key: $key");
        }

        return [(int) $parts[0], $parts[1]];
    }
}
