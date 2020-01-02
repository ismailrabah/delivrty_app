<?php
  
use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Database\Eloquent\Model; 
   
class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name'=>'Admin',
                'email'=>'admin@devinweb.ma',
                'is_admin'=>'1',
                'password'=> bcrypt('123456'),
                'cities_id'=>1,
            ],
            [
                'name'=>'Mohamed',
                'email'=>'Mohamed@devinweb.ma',
                'is_admin'=>'0',
                'password'=> bcrypt('123456'),
                'cities_id'=>1,
            ],
            [
                'name'=>'Hassan',
                'email'=>'Hassan@devinweb.ma',
                'is_admin'=>'0',
                'password'=> bcrypt('123456'),
                'cities_id'=>2,
            ],
            [
                'name'=>'Nada',
                'email'=>'Nada@devinweb.ma',
                'is_admin'=>'0',
                'password'=> bcrypt('123456'),
                'cities_id'=>3,
            ],
        ];
  
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}