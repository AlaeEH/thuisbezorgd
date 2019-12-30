<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
Use App\Order;
Use App\Restaurant;
Use App\Consumable;



    public function editRestaurant($id)
    {
        $restaurants = Restaurant::find($id);
        return view('admin/restaurants/edit')->with('restaurants', $restaurants);
    }

    public function updateRestaurants(Request $request, $id)
    {

        $restaurants = Restaurant::find($id);
        $restaurants->image = $request->get('image');
        $restaurants->title = $request->get('title');
        $restaurants->description = $request->get('description');
        $restaurants->delivery_time = $request->get('delivery_time');
        $restaurants->open_time = $request->get('open_time');
        $restaurants->closed_time = $request->get('closed_time');
        $restaurants->email = $request->get('email');
        $restaurants->phone_number = $request->get('phone_number');
        $restaurants->address = $request->get('address');
        $restaurants->zipcode = $request->get('zipcode');
        $restaurants->city = $request->get('city');
        $restaurants->save();

        return redirect()->route('restaurantsShow');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */ 
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->view('u'); 
    }

    // public function usersShow()
    // {
    //     $user = User::all();
    //     return view('admin/users/index')->with('user', $user);
    // }

    public function restaurantsShow()
    {
        $restaurants = Restaurant::all();
        return view('admin/restaurants/index')->with('restaurants', $restaurants);
    }

    public function consumablesShow(Request $request, $id)
    {
        $restaurant = Restaurant::with('consumable')->find($request->restaurant_id);
        $consumables = Consumable::find($request->restaurant_id);
        return view('admin/consumables/show')->with('restaurant', $restaurant)->with('consumables', $consumables);
    }

    // public function adminBesteldata(Request $request, $id)
    // {
    //     $user = User::find($id);
    //     $orders = Order::all();
    //     $orders->where($user, $orders->user_id);
    //     $orders->transform(function($order, $key) 
    //     {
    //         $order->cart = unserialize($order->cart);
    //         return $order;
    //     });

    //     return view('admin/users/besteldata')->with('orders', $orders)->with('user', $user);
    // }
}
