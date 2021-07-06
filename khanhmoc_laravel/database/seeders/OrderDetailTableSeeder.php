<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class OrderDetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //
        for ($i = 0; $i <= 50; $i++) {
            $order = Order::inRandomOrder()->limit(1)->get();
            $product = Product::inRandomOrder()->limit(1)->get();
            $faker = Faker::create('vi_VN');
            // foreach (range(1, 10) as $value) {

            if (OrderDetail::where('order_id', $order[0]->id)->where('product_id', $product['0']->id)->first()) {
            } else {
                DB::table('fs_order_detail')->insert([
                    'order_id' => $order[0]->id,
                    'product_id' => $product[0]->id,
                    'qty' => $faker->numberBetween($min = 1, $max = 3),
                    'price' => $product[0]->price,
                    'created_at' => $faker->dateTimeBetween('2021-01-01', '2021-03-01'),

                ]);
            }
            // }

        }
    }
}