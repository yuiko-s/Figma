<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request, Item $item)
    {
        $data = $request->validate([
            'comment' => ['required','string','max:255'],
            [
                'comment.required' => 'コメントを入力してください。',
                'comment.max'      => 'コメントは250文字以内で入力してください。',
            ]
        ]);

        Comment::create([
            'item_id' => $item->id,
            'user_id' => Auth::id(),
            'comment' => $data['comment'],
        ]);

        return back();
    }
}
