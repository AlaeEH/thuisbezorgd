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

class ConsumableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id)
    {
        $restaurant = Restaurant::with('consumable')->find($request->restaurant_id);
        $consumables = Consumable::find($request->restaurant_id);
        return view('admin/consumables/index')->with('restaurant', $restaurant)->with('consumables', $consumables);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $id)
    {
        $restaurant = Restaurant::all();
        $restaurants = Restaurant::with('consumable')->find($request->restaurant_id);
        $restaurant_id = $request->session()->get('restaurant_id');
        return view('admin/consumables/create')
        ->with('restaurants', $restaurants)
        ->with('restaurants', $restaurant)
        ->with('restaurant_id', $restaurant_id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $restaurantId)
    {
        $consumables = new Consumable;
        $consumables->restaurant_id = $restaurantId;
        $consumables->title = $request->title;
        $consumables->category = $request->category;
        $consumables->description = $request->description;
        $consumables->price = $request->price;

        if($request->has('image')){

            // $request->validate([
            //     'image' => ['image','mimes:jpeg,png,jpg','max:2048'],
            // ]);

            // Generate random Hash so there wont be any conficts in the database
            $hash = bin2hex(random_bytes(16));
            $fileName = $hash . '.' . $request->file('image')->getClientOriginalExtension();

            // Store File in the Storage    
            $image = Image::make($request->file('image'))->fit(150, 150)->save(public_path('storage\\'.$fileName), 100, request()->image->getClientOriginalExtension());
            $consumables->image = $fileName;

        }

       
        $consumables->save();

        return redirect()->route('admin.consumables.index');
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
    public function edit(Request $request, $restaurantId, $consumableId)
    {
        $consumables = Consumable::find($consumableId);
        return view('admin/consumables/edit')->with('consumables', $consumables);
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
        $consumables = Consumable::find($id);
        $consumables->title = $request->get('title');
        $consumables->description = $request->get('description');
        $consumables->image = $request->get('image');
        $consumables->price = $request->get('price');
        $consumables->category = $request->get('category');
        $consumables->save();

        return redirect()->route('admin.consumables.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $restaurantId, $consumableId)
    {
        $consumable = Consumable::find($consumableId);
        $consumable->delete();

        return redirect()->route('admin.consumables.index');
    }
}
