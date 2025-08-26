<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Profile;

class ProfilesTableSeeder extends Seeder
{
    public function run()
  {
    Profile::create([
        'user_id' => 1,
        'image' => '',
        'name' => '山田 太郎',
        'postal_code' => '123-4567',
        'prefecture' => '東京都',
        'city' => '新宿区',
        'address_line' => '西新宿2-8-1',
    ]);
  }
}
