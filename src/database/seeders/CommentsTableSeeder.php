<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comment;

class CommentsTableSeeder extends Seeder
{
    public function run()
    {
        $comments = [
            [
                'user_id' => 1,
                'item_id' => 1,
                'comment' => 'この商品はとても気に入りました！',
            ]
        ];

        foreach ($comments as $comment) {
            Comment::create($comment);
        }
    }
}
