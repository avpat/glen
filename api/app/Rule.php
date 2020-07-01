<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    protected $fillable = ['rule'];

    public function sections()
    {
        return $this->belongsToMany(Section::class, 'rule_section');
    }
}
