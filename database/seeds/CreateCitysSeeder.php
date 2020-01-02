<?php

use Illuminate\Database\Seeder;
use App\city;
use Illuminate\Database\Eloquent\Model; 

class CreateCitysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $citys = [
            [
                'name'=>'Rabat',
                'slug'=>'Rabat',
                'active'=>1
            ],
            [
                'name'=>'Casa',
                'slug'=>'Casa',
                'active'=>1
            ],
            [
                'name'=>'Tangier',
                'slug'=>'Tangier',
                'active'=>1
            ],
        ];
  
        foreach ($citys as $key => $value) {
            city::create($value);
        }
    }
}
