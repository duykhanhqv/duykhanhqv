<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Str;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $faker = Faker::create('vi_VN');
        foreach (range(1, 10) as $value) {
            DB::table('fs_user')->insert([
                'password' => bcrypt('12345'),
                'email' => $faker->email,
                'name' => $faker->name,
                'mobile' => $faker->phoneNumber,
                'address' => $faker->address,
                'dob' => $faker->date($format = 'Y-m-d', $max = '2000-01-01'),
                'gender' => $faker->numberBetween($min = 0, $max = 1),
                'created_at' => $faker->dateTimeBetween('2021-01-01', '2021-03-01'),
            ]);
        }


        // }
    }
}