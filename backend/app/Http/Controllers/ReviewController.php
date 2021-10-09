<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $review = Review::create([
            'user_id' => $request->userId,
            'store_id' => $request->storeId,
            'title' => $request->title,
            'comment' => $request->comment,
            'rate' => $request->rate,
        ]);
        $review->save();
    }
}
