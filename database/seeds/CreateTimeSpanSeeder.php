<?php

use Illuminate\Database\Seeder;

use App\time_span;
use Illuminate\Database\Eloquent\Model; 
class CreateTimeSpanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $time_span = [
            [
                'time_start'=>date('09:00:00'),
                'time_fin'=>date('12:00:00'),
                'active'=>1
            ],
            [
                'time_start'=>date('14:00:00'),
                'time_fin'=>date('18:00:00'),
                'active'=>1
            ],
            [
                'time_start'=>date('10:00:00'),
                'time_fin'=>date('13:00:00'),
                'active'=>1
            ],
            [
                'time_start'=>date('15:00:00'),
                'time_fin'=>date('19:00:00'),
                'active'=>1
            ],
            [
                'time_start'=>date('09:00:00'),
                'time_fin'=>date('13:00:00'),
                'active'=>1
            ],
            [
                'time_start'=>date('18:00:00'),
                'time_fin'=>date('20:00:00'),
                'active'=>1
            ]
        ];

        foreach ($time_span as $key => $value) {
            time_span::create($value);
        }
    }
}
