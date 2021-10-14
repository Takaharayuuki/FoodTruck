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


        $store_review = Review::where('store_id', $request->storeId);
        // 該当の店のレビュー総数
        $store_review_count = $store_review->count();

        $rateArray = [];

        foreach ($store_review as $review) {
            $rateArray[] = $review->rate;
        }

        dd($rateArray);
        $average_rate = '0';

        $store = Store::find($review['store_id']);
        $store->update(['rate' => $average_rate]);

        $review->save();
    }
}
