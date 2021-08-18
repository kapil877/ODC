<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Product;

class CreateUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adUser = [

        	[

        		'name'=>'Holmes Juarez',
               	'email'=>'minofyr@mailinator.com',
                'role_id'=>'1',
               	'password'=> bcrypt('admin@123'),
        	],
        ];

        foreach ($adUser as $key => $value) {
        	User::create($value);
        }
    }
}
