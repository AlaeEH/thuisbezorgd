<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;
Use App\Order;
Use App\Restaurant;
Use App\Consumable;
use Image;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = Restaurant::all();
        return view('admin/restaurants/index')->with('restaurants', $restaurants);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/restaurants/create');
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
            'title' => ['required', 'string', 'max:191', 'unique:restaurants'],
            'phone_number' => ['required', 'regex:/^(\(?\+?[0-9]*\)?)?[0-9_\- \(\)]*$/'],
            'email' => ['required', 'string', 'email', 'max:191', 'unique:restaurants'],
            'zipcode' => ['required', 'string', 'regex:/^[1-9][0-9]{3} ?(?!sa|sd|ss)[a-z]{2}$/i', 'max:8'],
        ]);

        $restaurants = new Restaurant;
        $restaurants->user_id = 1;
        $restaurants->title = $request->title;
        $restaurants->description = $request->description;
        $restaurants->delivery_time = $request->delivery_time;
        $restaurants->open_time = $request->open_time;
        $restaurants->closed_time = $request->closed_time;
        $restaurants->address = $request->address;
        $restaurants->zipcode = $request->zipcode;
        $restaurants->city = $request->city;
        $restaurants->phone_number = $request->phone_number;
        $restaurants->email = $request->email;

        if($request->has('image')){

            // $request->validate([
            //     'image' => ['image','mimes:jpeg,png,jpg','max:2048'],
            // ]);

            // Generate random Hash so there wont be any conficts in the database
            $hash = bin2hex(random_bytes(16));
            $fileName = $hash . '.' . $request->file('image')->getClientOriginalExtension();

            // Store File in the Storage        
            $image = Image::make($request->file('image'))->fit(320, 320)->save(public_path('storage\\'.$fileName), 100, request()->image->getClientOriginalExtension());
            $restaurants->image = $fileName;

        }

        $restaurants->save();

        return redirect()->route('admin.restaurants.index');
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
        $restaurants = Restaurant::find($id);
        return view('admin/restaurants/edit')->with('restaurants', $restaurants);
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
        $restaurants = Restaurant::find($id);
        // $restaurants->image = $request->get('image');
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

        return redirect()->route('admin.restaurants.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $restaurant = Restaurant::find($id);
        $restaurant->delete();

        return redirect()->route('admin.restaurants.index'); 
    }
}
