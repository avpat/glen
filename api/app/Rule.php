<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    protected $fillable = ['rule'];

    /**
     * we don't need timestamp for section table
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * same rule caan belong to many sections
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function sections()
    {
        return $this->belongsToMany(Section::class, 'rule_section');
    }
}
