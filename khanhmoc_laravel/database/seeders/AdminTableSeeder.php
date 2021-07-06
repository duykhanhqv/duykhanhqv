<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Str;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class AdminTableSeeder extends Seeder
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
            DB::table('fs_admin')->insert([
                'password' => bcrypt('12345'),
                'email' => $faker->email,
                'name' => $faker->name,

            ]);
        }
    }
}