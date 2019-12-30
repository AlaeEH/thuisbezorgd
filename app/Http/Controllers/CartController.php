<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Consumable;
use App\Order;
use Auth;
use Session;
use App\Cart;
use Carbon\Carbon;


class CartController extends Controller
{
    public function addToCart(Request $request, $id) 
    {
        $consumables = Consumable::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($consumables, $consumables->id);
        $request->session()->put('cart', $cart);
        
        return redirect()->back()->with('success', 'The product has succesfully been added to the cart.');

    }

    public function getCart()
    {
        if(!Session::has('cart')){return view('cart/shoppingcart');}
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('cart/shoppingcart', ['consumables' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function getReduceByOne($id) {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);
        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } 
        else {
            Session::forget('cart');
        }
        return redirect()->route('shoppingcart')->with('success', 'Product is succesfully reduces by one.');
    }


    public function getRemoveItem($id) {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } 
        else {
            Session::forget('cart');
        }
        return redirect('/cart/shoppingcart')->with('success', 'Product is succesfully removed from the cart.');
    }

    public function getCheckout()
    {
        if (!Session::has('cart')) {
            return view('cart/shoppingcart');
        }
        $user = auth()->user();
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        $currentDate = Carbon::now('Europe/Amsterdam');
        $currentTime = date_format($currentDate,"H:i");
        return view('cart/checkout', ['total' => $total])->with('user', $user)->with('currentTime', $currentTime);
    }

    public function postCheckout(Request $request)
    {
        $consumables = Consumable::get();

        if (!Session::has('cart')) {
            return redirect()->route('user.shoppingCart');
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $orders = new Order;
        $orders->user_id = Auth::id();
        $orders->restaurant_id = $request->session()->get('restaurant_id');
        $orders->name = $request->name;
        $orders->address = $request->address;
        $orders->zipcode = $request->zipcode;
        $orders->phone_number = $request->phone_number;
        $orders->email = $request->email;
        $orders->company_name = $request->company_name;
        $orders->delivery_time = $request->delivery_time;
        $orders->cart = serialize($cart);
        $orders->save();

        return redirect()->route('bestelgeschiedenis');
    }
}
