<?php

/**
 * Interface ruleEvaluatorInterface
 */

use Illuminate\Support\Collection;

interface ruleEvaluatorInterface
{

    public function evaluate(Collection $payload): bool;

}
