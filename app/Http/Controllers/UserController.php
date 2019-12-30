<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
Use App\Order;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Auth::user()->order;
        $orders->transform(function($order, $key) 
        {
            $order->cart = unserialize($order->cart);
            return $order;
        });
        
        return view('user/bestelgeschiedenis', ['orders' => $orders]);
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
        //
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
        return view('user.edit')->with('user', $user);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $user = User::find($id);

        // $request->validate([
        //     'name' => ['required', 'string', 'max:191', 'unique:users'],
        //     'address' => ['required', 'string', 'max:191'],
        //     'phone_number' => ['required', 'regex:/^(\(?\+?[0-9]*\)?)?[0-9_\- \(\)]*$/'],
        //     'email' => ['required', 'string', 'email', 'max:191', 'unique:users'],
        //     'password' => ['required', 'string', 'min:8', 'confirmed'],
        //     'zipcode' => ['required', 'string', 'regex:/^[1-9][0-9]{3} ?(?!sa|sd|ss)[a-z]{2}$/i', 'max:8'],
        // ]);

        $user->name = $request->get('name');
        $user->address = $request->get('address');
        $user->zipcode = $request->get('zipcode');
        $user->city = $request->get('city');
        $user->phone_number = $request->get('phone_number');
        $user->email = $request->get('email');
        $user->save();

        return back()->with('user', $user)->with('success', 'Your credentials have been updated succesfully.');
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
