<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Like;

class LikesTableSeeder extends Seeder
{
    public function run()
    {
        $likes = [
            [
                'user_id' => 1,
                'item_id' => 1,
            ]
        ];
        foreach ($likes as $like) {
            Like::create($like);
         }
    }
}