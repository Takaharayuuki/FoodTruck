<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Store;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        dd($request);
        // $reviews = Review::where('user_id', $request$id)->get();
        // return $reviews;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required | max:30',
            'comment' => 'required | max:426',
        ]);



        $form = $request->all();
        $review = new Review();
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $file_name = $file->getClientOriginalName();
            $request->file('file')->storeAs('public/', $file_name);
            $review->thumbnail_url = '/storage/' . $file_name;
        }
        $review->user_id = $form['userId'];
        $review->store_id = $form['storeId'];
        $review->user_name = $form['userName'];
        $review->reviewDt = $form['reviewDt'];
        $review->rate = $form['rate'];
        $review->comment = $form['comment'];
        $review->title = $form['title'];

        $review->save();

        $store_review = Review::where('store_id', $form['storeId'])->get();
        // 該当の店のレビューの数
        $store_review_count = $store_review->count();
        // スターの総数
        $total_star = 0;
        foreach ($store_review as $review) {
            $total_star += (int)$review->rate;
        }
        if ($store_review_count == 0 || "0") {
            $store = Store::find($review['store_id']);
            $store->rate = $form['rate'];
            $store->save();
        } else {
            (int)$average_rate = (int)$total_star / (int)$store_review_count;
            $average_rate = round((int)$average_rate);

            $store = Store::find($review['store_id']);
            $store->rate = (string)$average_rate;
            $store->save();
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        if ($request->path == 'mypage') {
            $reviews = Review::where('user_id', $id)->orderBy('created_at', 'desc')->get();
            return $reviews;
        } else {
            $reviews = Review::where('store_id', $id)->orderBy('created_at', 'desc')->get();
            return $reviews;
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
