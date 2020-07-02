<?php

namespace Tests\Feature;

use App\Rule;
use App\Section;
use App\Survey;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SurveyTest extends TestCase
{
    use RefreshDatabase;

    protected $survey;
    protected $payLoad;

    /**
     * setup for the frequently used records and payload
     */
    public function setUp():void
    {
        parent::setUp();

        $this->survey = factory(Survey::class)
            ->create();

        $sections = $this->survey->sections()->createMany(
            factory(Section::class, 4)->make()->toArray()
        );
        $rule = factory(Rule::class, 4)->create();

        $sections->rules()->attach($rule);

        $this->payLoad = collect([
            'Annual Income'             => 30000,
            'Borrower Trustworthiness'  => 'Trustworthy',
            'Borrowers Age'             => 27,
            'Loan length in Months'     => 12,
            'Loan Amount'               => 90000
        ]);


    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIsServiceReachable()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * test Evaluate survey form
     */
    public function testEvaluateSurveyForm()
    {
        //check if the survey has sections
        $this->assertEquals(4, $this->survey->sections->count());


        $surveyId = $this->surveys->services()->first()->pluck('id');
        $ruleId = $this->surveys->services->rules()->first()->pluck('id');

        $this->assertDatabaseHas('rule_section', [
            'section_id' => $surveyId,
            'rule_id' => $ruleId
        ]);

    }

    /**
     * validation test
     */
    public function testValidate()
    {
        $this->assertEquals(4, $this->survey->sections->count());

    }



}
