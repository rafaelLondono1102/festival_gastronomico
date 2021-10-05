<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreRestaurantRequest;


class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = Restaurant::owned(Auth::id())->orderBy('name','asc')->get();

        return view('restaurants.index',compact('restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('name','asc')->pluck('name','id');
        return view('restaurants.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRestaurantRequest $request)
    {
        //TODO: realizar la validacion de los datos de entrada
        $inputs = $request->all();

        /* $validated = $request->validate([
            'name'        => 'required|string|min:5|max:50',
            'description' => 'required|string|min:10',
            'city'        => 'required|string|min:5|max:30',
            'phone'       => 'required|alpha_dash|min:10|max:10',
            'category_id' => 'required|exists:categories,id',
            'delivery'    => ['required',Rule::in(['y','n'])],
        ]);
 */
        $restaurant = new Restaurant();
        $restaurant->fill($inputs);
        $restaurant->user_id = Auth::id();
        $restaurant->save();

        Session::flash('success', 'Restaurante agregado exitosamente');

        return redirect(route('restaurants.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        return view('restaurants.show',compact('restaurant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        $categories = Category::orderBy('name','asc')->pluck('name','id');
        return view('restaurants.edit',compact('categories','restaurant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRestaurantRequest $request, Restaurant $restaurant)
    {
        $inputs = $request->all();
    
        $restaurant->fill($inputs);
        $restaurant->user_id = Auth::id();
        $restaurant->save();

        Session::flash('success', 'Restaurante editado exitosamente');

        return redirect(route('restaurants.index'));
        //return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        $restaurant->delete();
        Session::flash('success', 'Restaurante removido exitosamente');
        return redirect(route('restaurants.index'));
    }



    ////////////////////////////////
    public function showFrontPage(){
        $restaurants=Restaurant::orderBy('name','asc')->get(); 

        return view('front_page.index',compact('restaurants'));
    }
}
