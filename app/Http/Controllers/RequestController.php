<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
Use App\Models\Requestitem;
use Carbon\Carbon;
Use App\Models\Item;

class RequestController extends Controller
{
    function request($item_id){
        return view('item.request_item', compact('item_id'));
    }
    function order(Request $request){
        Requestitem::insert([
            'item_id' => $request->item_id,
            'user_id' => Auth::user()->id,
            'user_name' => $request->user_name,
            'user_email' => $request->user_email,
            'user_number' => $request->user_number,
            'user_address' => $request->user_address,
            'item_quantity' => $request->item_quantity,
            'created_at' => Carbon::now()
        ]);
        $items = Item::all();
        $search = $request['search'] ?? "";
        $filter = $request['filter'] ?? "";
        return view("welcome",compact('items','search','filter'));
    }
    function index(){
        $items = Requestitem::all();
        return view("item.request_list",compact('items'));
    }
}
