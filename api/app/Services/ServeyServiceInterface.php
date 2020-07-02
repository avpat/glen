<?php

namespace App\Services;

use App\Survey;
use Illuminate\Support\Collection;

interface SurveyServiceInterface
{

    public function eveluateSurveyForm(Collection $payload, Survey $survey): bool;
}
