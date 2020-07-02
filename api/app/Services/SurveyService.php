<?php

namespace App\Services;

use App\Survey;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;

class SurveyService implements SurveyServiceInterface
{

    private $ruleEvaluator;

    public function __construct(\ruleEvaluatorInterface $ruleEvaluator)
    {
            $this->ruleEvaluator = $ruleEvaluator;

    }

    /**
     * To process each rule, Evaluates the payload according the rule and aggreggate the response in to single boolean
     *
     * @param Collection $payload
     * @param Survey $survey
     * @return bool
     */
    public function eveluateSurveyForm(Collection $payload, Survey $survey) : bool
    {
        //get sections from the survey
        $sections = $survey->sections;
        //defining rules array to accumulate all the rules in one array so we canpass the
        //by default, assuming the values will be valid
        $isValid = true;

        //get all the rules from the section and push it to the single array
        foreach ($sections as $section)
        {
            //if the section rule is mandatory but i'm removing as some of the faker data has optional value
            if ($section->status == "mandatory" || isset($payload[$section->name])) {

                //NOTE: I'm bit unsure of few lines in the task sheet as one para says
                //      "class should process each rule, Evaluates the payload according the rule and aggreggate the response in to single boolean"
                //      But then, I see, rule evaluator interface which is supposed to handle the validation
                //      since, i've already implemented the validation, I'm checking if the interface is available if not then use my validation
                if($this->ruleEvaluator) {
                    $isValid = $this->ruleEvaluator->evaluate($payload);
                }
                else {
                    //this is my impletation for the validation
                    $isValid = $this->validate($payload, $section);
                }

            } else {
                return false;
            }
        }
        return $isValid;
    }

    /**
     * Evaluates the payload according the rule and aggregates the response in to single boolean
     *
     * @param Collection $payload
     * @param $section
     * @return bool
     */
    private function validate(Collection $payload, $section)
    {
        $rules = [];

        if(isset($section->rules))
        {
            foreach($section->rules as $rule){
                //unserialise the rules and push the rules array
                $temp = unserialize($rule['rule']);
                array_push($rules, array_pop($temp));
            }
            // foreach payload value, we'll loop through and apply the rules on it
            foreach($payload as $key => $value) {
                foreach ($rules as  $rule) {
                    //loop through to the actual formula and apply
                    foreach($rule as $ruleName => $formula ) {
                        if($key == $ruleName) {
                            //use laravel validator
                            $validator = Validator::make(['field' => $value], [
                                'field' => $formula,
                            ]);

                            if ($validator->fails())
                            {
                                //if validator fails then show a detailed message to dev
                                //dump("validator failed for following value and formula:: ");
                                //dump($value); dump($formula);
                                return false;
                            }
                        }
                    }
                }
            }
        }
        return true;
    }
}
