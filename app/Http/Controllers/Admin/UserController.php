<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;
Use App\Order;
Use App\Restaurant;
use view;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return view('admin/users/index')->with('user', $user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $id)
    {
       return view('admin/users/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $restaurantId)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:191', 'unique:users'],
            'address' => ['required', 'string', 'max:191'],
            'phone_number' => ['required', 'regex:/^(\(?\+?[0-9]*\)?)?[0-9_\- \(\)]*$/'],
            'email' => ['required', 'string', 'email', 'max:191', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'zipcode' => ['required', 'string', 'regex:/^[1-9][0-9]{3} ?(?!sa|sd|ss)[a-z]{2}$/i', 'max:8'],
        ]);

        $users = new User;
        $users->name = $request->name;
        $users->address = $request->address;
        $users->zipcode = $request->zipcode;
        $users->city = $request->city;
        $users->phone_number = $request->phone_number;
        $users->email = $request->email;
        $users->password = $request->password;
        $users->save();

        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $orders = Order::all();
        $orders->transform(function($order, $key) 
        {
            $order->cart = unserialize($order->cart);
            return $order;
        });

        return view('admin/users/besteldata')->with('orders', $orders)->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin/users/edit')->with('user', $user);
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
        $user = User::find($id);
        $user->name = $request->get('name');
        $user->address = $request->get('address');
        $user->zipcode = $request->get('zipcode');
        $user->city = $request->get('city');
        $user->phone_number = $request->get('phone_number');
        $user->email = $request->get('email');
        $user->save();

        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('admin.users.index');   
    }

    public function invoice(Request $request, $userId, $id)
    {
        $user = User::findOrFail($userId);
        $orders = Order::findOrFail($id);

        $cart = $orders->cart;
        $cart = unserialize($cart);

        return view('admin/users/invoice')
            ->with('orders', $orders)
            ->with('user', $user)
            ->with('cart', $cart);
    }
}
