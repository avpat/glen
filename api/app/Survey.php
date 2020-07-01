<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    protected $guarded = [];

    protected  $fillable = ['name', 'description'];

    protected $with = [ 'sections'];

    /**
     * Each survey has many sections
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sections()
    {
        return $this->hasMany('App\Section', 'survey_id');
    }


}
