<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = User::inRandomOrder()->limit(1)->get();
        $faker = Faker::create('vi_VN');
        foreach (range(1, 10) as $value) {
            DB::table('fs_order')->insert([
                'user_id' => $user[0]->id,
                'created_at' => $faker->dateTimeBetween('2021-01-01', '2021-03-01'),
                'name' => $faker->name,
                'address' => $faker->address,
                'email' => $faker->email,
                'mobile' => $faker->phoneNumber,
                'status' => $faker->numberBetween($min = -1, $max = 4)
            ]);
        }
    }
}