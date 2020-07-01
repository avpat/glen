<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Section extends Model
{

    protected $fillable = ['survey_id', 'name', 'description', 'status'];

    /**
     * we don't need timestamp for section table
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * instead of enum field, we are storing status as tinyint in the database, if we add more statuses then it can be added here
     * If needed, status can be added in the config and be accessed here.
     *
     * @var array
     */
    protected $status = [
        'optional',
        'mandatory'
    ];

    /**
     * Get optional value from the sections table and convert it inot human readable format
     * Instead of enums, using accessor
     * ref: https://laravel.com/docs/7.x/eloquent-mutators#accessors-and-mutators
     *
     *
     * @param integer $value
     * @return string
     */
    public function getStatusAttribute($value)
    {
        return Arr::get($this->status, $value);
    }

    /**
     * Secting belongs to Survey
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     *
     */
    public function survey()
    {
        return $this->belongsTo('App\Survey', 'section_id');
    }


    /**
     * Section can have many rules
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function rules()
    {
        return $this->belongsToMany(Rule::class, 'rule_section');
    }
}
