<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class exclude_dates extends Model
{
    protected $table = 'exclude_dates';

     /**
     * @var city_time_span
     */
    public function city_time_spans()
    {
        return $this->belongsTo('App\city_time_span', 'city_time_spans_id');
    }
}
