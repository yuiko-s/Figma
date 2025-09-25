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
                'paymentprice',
                'paymentmethod',
                'postal_code'=>'123-4567',
                'shippingaddress'=>'東京都新宿区西新宿2-8-1',
                
                
            ]
        ];
    }
}
