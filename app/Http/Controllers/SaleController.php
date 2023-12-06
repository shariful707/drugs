<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Sale;

class SaleController extends Controller
{
    function index(){
        $sale_lists = Sale::orderBy('item_count', 'desc')->get();
        return view('profile.sale_list', compact('sale_lists'));
    }
}
