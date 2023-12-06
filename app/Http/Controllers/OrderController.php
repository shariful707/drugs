<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
Use App\Models\Item;
Use App\Models\User;
Use App\Models\cart;
Use App\Models\wishlist;
Use App\Models\Order;
Use App\Models\Order_Detail;
Use App\Models\Order_Billing_Detail;

class OrderController extends Controller
{
    function index(){
        $orders = Order::all();
        $single_orders = Order_Billing_Detail::where('email','=',Auth::user()->email)->get();
        return view('profile.order_list', compact('orders','single_orders'));
    }

    function items($order_id){
        $order_items = Order_Detail::where('order_id','=',$order_id)->get();
        return view('profile.order_item', compact('order_items'));
    }
    function billing_details($order_id){
        $order_billing_details = Order_Billing_Detail::where('order_id','=',$order_id)->get();
        return view('profile.order_billing_details', compact('order_billing_details'));
    }
}
