<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;
use App\Consumable;
use Auth;
use Image;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $restaurant_id = $request->session()->get('restaurant_id'); 
        $currentDate = Carbon::now('Europe/Amsterdam');
        $currentTime = date_format($currentDate,"H:i");    
        $restaurants = Restaurant::all();
        $restaurants = Restaurant::where('title', 'like', $request->search.'%')->orderBy('title', 'ASC')->get();
        return view('welcome')->with('restaurants', $restaurants)->with('currentTime', $currentTime);
    }

    public function search(Request $request)
    {
        $restaurants = Restaurant::where('title', 'like', $request->search.'%')->orderBy('title', 'ASC')->get();
        return view('welcome')->with('restaurants', $restaurants);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('restaurants.create');
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
        $restaurants->user_id = Auth::id();
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

        return redirect()->route('restaurants.index');
    }

    /**
     * Display the specified resource.
     *  
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $restaurants = Restaurant::with('consumable')->findOrFail($id);
        $request->session()->put('restaurant_id', $id);
        return view('restaurants.show')->with('restaurants', $restaurants); 
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
        Restaurant::where('id', $id)->delete();
    }
}
