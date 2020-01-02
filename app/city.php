<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class city extends Model
{
    use Notifiable;
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug'
    ];

    
    protected $table = 'cities';

    /**
     * The TimmeSpan that belong to the city.
     */
    public function time_spans()
    {
        return $this->belongsToMany('App\time_span')->using('App\city_time_span')
            ->withPivot([
                'active'
            ]);
    }
}
