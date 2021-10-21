<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
        if(Auth::user()->type != 'admin' & Auth::user()->type != 'owner'){
            Session::flash('failure', 'El usuario no tiene permiso para esta accion');
            return redirect(route('home'));
        }

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
        if(Auth::user()->type != 'admin' & Auth::user()->type != 'owner'){
            Session::flash('failure', 'El usuario no tiene permiso para esta accion');
            return redirect(route('home'));
        }
        $restaurant = new Restaurant();
        $inputs = $request->all();
        if($archivo=$request->file('logo')){
            $nombre=$archivo->getClientOriginalName();
            $archivo->move('images',$nombre);
            $inputs['logo']=$nombre;
            $restaurant->logo=$inputs['logo'];
        }
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
        $comments = $restaurant->comments()->get();
        return view('restaurants.show',compact('restaurant','comments'));
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
    public function showFrontPage(Request $request){

        if(!isset($request['filter']))
            $restaurants=Restaurant::orderBy('name','asc')->paginate(8); 
        else 
            $restaurants=Restaurant::orderBy('name','asc')->where('category_id','=',$request['filter'])->paginate(8); 
        
        $categories=Category::orderBy('name','asc')->pluck('name','id');
        $filter=$request['filter'] ?? null;
        return view('front_page.index',compact('restaurants','categories','filter'));
    }

    public function showRestaurant(Request $request,Restaurant $restaurant){
        $comments = $restaurant->comments()->get();
        return view('front_page.show',compact('restaurant','comments'));
    }
}
