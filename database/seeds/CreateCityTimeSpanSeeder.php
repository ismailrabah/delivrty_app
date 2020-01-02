<?php

use Illuminate\Database\Seeder;
use App\city_time_span;
use Illuminate\Database\Eloquent\Model; 

class CreateCityTimeSpanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $city_time_span = [
            [
                'cities_id'=>1,
                'time_spans_id'=>1,
                'active'=>1
            ],
            [
                'cities_id'=>1,
                'time_spans_id'=>2,
                'active'=>1
            ],
            [
                'cities_id'=>2,
                'time_spans_id'=>3,
                'active'=>1
            ],
            [
                'cities_id'=>2,
                'time_spans_id'=>4,
                'active'=>1
            ],
            [
                'cities_id'=>3,
                'time_spans_id'=>5,
                'active'=>1
            ],
            [
                'cities_id'=>3,
                'time_spans_id'=>2,
                'active'=>1
            ],
            [
                'cities_id'=>3,
                'time_spans_id'=>6,
                'active'=>1
            ]
        ];

        foreach ($city_time_span as $key => $value) {
            city_time_span::create($value);
        }
    }
}
