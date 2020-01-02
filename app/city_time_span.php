<?php

namespace App;


use Illuminate\Database\Eloquent\Relations\Pivot;

class city_time_span extends Pivot
{
    protected $table = 'city_time_spans';

     /**
     *
     */
    public function exclude_dates()
    {
        return $this->hasMany('App\exclude_dates');
    }

    /**
     * .
     */
    public function city()
    {
        return $this->belongsTo('App\city' , 'cities_id');
    }

    /**
     * 
     */
    public function time_span()
    {
        return $this->belongsTo('App\time_span' , 'time_spans_id');
    }
}
