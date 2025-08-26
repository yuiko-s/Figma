<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders = [
            [
                'buyer_id' => 1,
                'item_id' => 1,
                'price' => 15000,
                'status' => 'paid',
                'postal_code' => '123-4567',
                'prefecture' => '東京都',
                'city' => '新宿区',
                'address_line' => '西新宿2-8-1',
                'phone_number' => '08012345678',
            ]
        ];
    }
}
