<?php

namespace App\Http\Controllers;

use App\Rule;
use App\Services\SurveyService;
use App\Survey;
use Illuminate\Http\Request;

class SurveyController extends Controller
{

    /**
     * Only for the test purpose pass the data via controller
     * @param Request $request
     * @return array
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     *
     */
    public function index(Request $request)
    {
        //number 6 record has rules
        $survey = Survey::find(6);
        //create a sample payload
        $payLoad = collect([
            'Annual Income'             => 30000,
            'Borrower Trustworthiness'  => 'Trustworthy',
            'Borrowers Age'             => 27,
            'Loan length in Months'     => 12,
            'Loan Amount'               => 90000
        ]);

        $surveyService = app()->make(SurveyService::class);
        $surveyService->eveluateSurveyForm($payLoad, $survey);

        return $request->all();
    }
}
