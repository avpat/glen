<?php

namespace App\Services;

use Illuminate\Support\Collection;

class ruleEvaluatorService implements ruleEvaluatorInterface
{
    public function evaluate(Collection $payload): bool
    {
        return true;
    }
}
