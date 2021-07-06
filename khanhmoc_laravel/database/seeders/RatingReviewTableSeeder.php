<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\RatingAndReview;
use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class RatingReviewTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i = 0; $i <= 2000; $i++) {
            $user = User::inRandomOrder()->limit(1)->get();
            $product = Product::inRandomOrder()->limit(1)->get();
            $faker = Faker::create();
            // foreach (range(1, 10) as $value) {

            if (RatingAndReview::where('product_id', $product['0']->id)->where('user_id', $user[0]->id)->first()) {
            } else {
                DB::table('fs_rating_review')->insert([
                    'product_id' => $product[0]->id,
                    'user_id' => $user[0]->id,
                    'rating' => $faker->numberBetween($min = 3, $max = 5),
                    'review' => $faker->paragraph,
                    'created_at' => $faker->dateTimeBetween('2021-01-01', '2021-03-01'),
                ]);
            }
            // }

        }
    }
}