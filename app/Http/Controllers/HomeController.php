<?php

namespace App\Http\Controllers;
use App\Mail\OrderMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
Use App\Models\Item;
Use App\Models\User;
Use App\Models\cart;
Use App\Models\wishlist;
Use App\Models\Order;
Use App\Models\Order_Detail;
Use App\Models\Order_Billing_Detail;
Use App\Models\Sale;
use Session;
use Stripe;
use Carbon\Carbon;



class HomeController extends Controller
{
    public function index()
    {
        $items = Item::all();
        $role=Auth::user()->role;
        $search = $request['search'] ?? "";
        $filter = $request['filter'] ?? "";
        if ($role== "1")
        {
            return view("dashboard",compact('items'));
        }
        else
        {
            return view("welcome",compact('items','search','filter'));
        }
    }
    function home(Request $request){
        $search = $request['search'] ?? "";
        $filter = $request['filter'] ?? "";
        if($search != ""){
            $items = Item::where('item_name','LIKE', "%$search%")->get();
        }elseif($filter != ""){
            $items = Item::where('item_type','=', $filter)->get();
        }
        else{
            $items = Item::all();
        }

        return view('welcome', compact('items','search','filter'));
    }

    public function show_cart()
    {
        $id=Auth::user()->id;
        $cart=cart::where('user_id','=',$id)->get();
        return view('user.cart',compact('cart'));
    }

    public function show_wishlist()
    {
        $id=Auth::user()->id;
        $wishlist=wishlist::where('user_id','=',$id)->get();
        return view('user.wish_list',compact('wishlist'));
    }

    public function cash_order()
    {


        return view('user.cash_order');
    }

    public function place_Corder(Request $request ){

        if($request->payment_status == 1 || $request->payment_status == 2){
            $order_id = Order::insertGetId([
                'total' => session('total_from_cart'),
                'payment_status' => $request->payment_status,
                'created_at' => Carbon::now()
            ]);
            Order_Billing_Detail::insert([
                'order_id' => $order_id,
                'name' => $request->name,
                'email' => $request->mail,
                'phone' => $request->phone,
                'address' => $request->address,
                'user_id' => Auth::user()->id,
                'created_at' => Carbon::now()
            ]);
            $cart_items=cart::where('user_id','=', Auth::user()->id)->get();
            foreach($cart_items as $cart_item){
                Order_Detail::insert([
                    'order_id' => $order_id,
                    'item_id' => $cart_item->item_id,
                    'item_name' => Item::find($cart_item->item_id)->item_name,
                    'item_price' => Item::find($cart_item->item_id)->item_sell_price,
                    'item_quantity' => $cart_item->item_quantity,
                    'created_at' => Carbon::now()
                ]);
            }
            if($request->payment_status == 2){
                foreach($cart_items as $cart_item){
                    $order_item = Item::find($cart_item->item_id);
                    $stock = $order_item->item_stock;
                    $order_item->item_stock = $stock-$cart_item->item_quantity;
                    $order_item->save();
                    Sale::updateOrInsert(
                        ['item_id' => $cart_item->item_id],
                        ['item_count' => \DB::raw("item_count + $cart_item->item_quantity")]
                    );
                }
                $cart_items=cart::where('user_id','=', Auth::user()->id)->delete();
                return redirect('show_cart');
            }
        }
        else{
            echo "This payment type not available";
        }

        // echo $request->payment_status;
        // echo session('total_from_cart');
        // echo $request->name;
        // echo $request->phone;
        // echo $request->mail;
        // echo $request->address;

        // $user=Auth::user();
        // $userid=$user->id;


        // //to get all item with same user id
        // $data=cart::where('user_id','=',$userid)->get();

        // $pdata=User::where('id','=',$userid)->get();

        // foreach($data as $data)


        // {
        //    $order=new order;
        //    $order->user_id=$data->user_id;
        //    $order->user_name=$request->name;
        //    $order->user_email=$request->mail;
        //    $order->user_address=$request->address;
        //    $order->user_phone=$request->phone;








        //    $order->item_name=$data->item_name;
        //    $order->item_id=$data->item_id;
        //    $order->price=$data->item_price;
        //    $order->item_quatity=$data->item_quantity;
        //    $order->payment_mode=0;
        //    $order->order_track = rand(1111,9999);
        //    $order->save();


        //    $cart_id=$data->id;
        //    $cart=cart::find($cart_id);
        //    //$this->sendconfmail($order);
        //    //---------------------------------------
        //    $this->sendconfmail($cart);



        //    $cart->delete();






        // }
        // //returns to homepage

        // return redirect('/');
        // //$this->sendconfmail($order);

    }

    public function card($totalprice)
    {

        return view('user.card',compact('totalprice'));
    }




    public function stripePost(Request $request,$totalprice)

    {


        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));



        Stripe\Charge::create ([

                "amount" => $totalprice * 100,

                "currency" => "usd",

                "source" => $request->stripeToken,

                "description" => "Welcome"

        ]);



        $user=Auth::user();
        $userid=$user->id;


        //to get all item with same user id
        $data=cart::where('user_id','=',$userid)->get();

        $pdata=User::where('id','=',$userid)->get();

        foreach($data as $data)


        {
           $order=new order;
           $order->user_id=$data->user_id;
           $order->user_name=$request->name;
           $order->user_email=$request->mail;
           $order->user_address=$request->address;
           $order->user_phone=$request->phone;




           $order->item_name=$data->item_name;
           $order->item_id=$data->item_id;
           $order->price=$data->item_price;
           $order->item_quantity=$data->item_quantity;
           $order->payment_mode=1;
           $order->save();


           $cart_id=$data->id;
           $cart=cart::find($cart_id);
           $cart->delete();





        }
        //returns to homepage

        return redirect('/');
        $this->sendconfmail($order);

    }

    public function sendconfmail($cart)
    {


        Mail::to($cart->user_mail)->send(new OrderMail($cart));
    }



}
