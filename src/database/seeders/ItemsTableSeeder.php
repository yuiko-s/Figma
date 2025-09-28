<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
    [
        'user_id' => 1,
        'name' => '腕時計',
        'brand' => 'Rolax',
        'price' => 15000,
        'description' => 'スタイリッシュなデザインのメンズ腕時計',
        'info' => '良好',
        'image' => 'img/watch.jpg',
        'is_sold' => false,
    ],
    [
        'user_id' => 1,
        'name' => 'HDD',
        'brand' => '西芝',
        'price' => 5000,
        'description' => '高速で信憑性の高いハードディスク',
        'info' => '目立った傷や汚れなし',
        'image' => 'img/HDD.jpg',
        'is_sold' => false,
    ],
    [
        'user_id' => 1,
        'name' => '玉ねぎ３束',
        'brand' => 'なし',
        'price' => 300,
        'description' => '新鮮な玉ねぎ３束のセット',
        'info' => 'やや傷や汚れあり',
        'image' => 'img/onion.jpg',
        'is_sold' => false,
    ],
    [
        'user_id' => 1,
        'name' => '革靴',
        'brand' => '',
        'price' => 4000,
        'description' => 'クラシックなデザインの革靴',
        'info' => '状態が悪い',
        'image' => 'img/shoes.jpg',
        'is_sold' => false,
    ],
    [
        'user_id' => 1,
        'name' => 'ノートPC',
        'brand' => '',
        'price' => 45000,
        'description' => '高性能なノートパソコン',
        'info' => '良好',
        'image' => 'img/pc.jpg',
        'is_sold' => false,
    ],
    [
        'user_id' => 1,
        'name' => 'マイク',
        'brand' => 'なし',
        'price' => 8000,
        'description' => '高音質のレコーディング用マイク',
        'info' => '目立った傷や汚れなし',
        'image' => 'img/microphone.jpg',
        'is_sold' => false,
    ],
    [
        'user_id' => 1,
        'name' => 'ショルダーバッグ',
        'brand' => '',
        'price' => 3500,
        'description' => 'おしゃれなショルダーバッグ',
        'info' => 'やや傷や汚れあり',
        'image' => 'img/bag.jpg',
        'is_sold' => false,
    ],
    [
        'user_id' => 1,
        'name' => 'タンブラー',
        'brand' => 'なし',
        'price' => 500,
        'description' => '使いやすいタンブラー',
        'info' => '状態が悪い',
        'image' => 'img/tumbler.jpg',
        'is_sold' => false,
    ],
    [
        'user_id' => 1,
        'name' => 'コーヒーミル',
        'brand' => 'Starbacks',
        'price' => 4000,
        'description' => '手動のコーヒーミル',
        'info' => '良好',
        'image' => 'img/coffee.jpg',
        'is_sold' => false,
    ],
    [
        'user_id' => 1,
        'name' => 'メイクセット',
        'brand' => '',
        'price' => 2500,
        'description' => '便利なメイクアップセット',
        'info' => '目立った傷や汚れなし',
        'image' => 'img/makeup.jpg',
        'is_sold' => false,
    ],
];

foreach ($items as $param) {
    \App\Models\Item::create($param);
}
    }
}
