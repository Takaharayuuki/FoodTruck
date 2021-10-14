<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Store;
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


        $store_review = Review::where('store_id', $request->storeId)->get();
        // 該当の店のレビュー総数
        $store_review_count = $store_review->count();

        $total_star = 0;

        foreach ($store_review as $review) {
            $total_star += (int)$review->rate;
        }

        (int)$average_rate = (int)$total_star / (int)$store_review_count;
        $average_rate = round((int)$average_rate);

        $store = Store::find($review['store_id']);
        $store->rate = (string)$average_rate;
        $store->save();
        $review->save();
    }
}
