<?php

namespace App\Services\SurveyService;

use App\Survey;
use Illuminate\Support\Collection;


class SurveyService
{

    private $ruleEvaluator;

    public function eveluateSurveyForm(Collection $payload, Survey $survey) : bool
    {
        $sections = $survey->sections();

        if($sections)
        {
            foreach ($sections as $section) {
                if ($section->status == 'optional' || !isset($payload[$section->name])) {
                    return false;
                }
            }
        }

        return true;
    }
}
