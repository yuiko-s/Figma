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
        'address' => '東京都新宿区西新宿2-8-1',
        'building_name' => 'ビル'
    ]);
  }
}
