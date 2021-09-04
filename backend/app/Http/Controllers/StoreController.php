<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Store::all();
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
        $form = $request->all();
        $store = new Store;
        // 画像ファイルの有無の確認
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $file_name = $file->getClientOriginalName();
            $request->file('file')->storeAs('public/', $file_name);
            $store->thumbnail_url = '/storage/' . $file_name;
        }
        $store->name = $form['storeName'];
        $store->category = $form['storeCategory'];
        $store->postalcode1 = $form['storePostal1'];
        $store->postalcode2 = $form['storePostal2'];
        $store->prefecture = $form['storePrefecture'];
        $store->city = $form['storeCity'];
        $store->town = $form['storeTown'];
        $store->addressRemark = $form['storeAddressRemark'];
        $store->period1 = $form['storePeriod1'];
        $store->period2 = $form['storePeriod2'];
        $store->opening_hours = $form['storeOpeningHours'];
        $store->closing_time = $form['storeClosingTime'];
        $store->remark = $form['storeRemark'];


        $store->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
