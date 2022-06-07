<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;

class RestaurantController extends Controller
{
    public function adminGetRestaurants()
    {
        // to get all the restos
        $restos = Restaurant::all();
        return response()->json([ // we want to return a json object
            "status" => "Success",
            "restaurants" => $restos
        ], 200);
    }

    public function adminAddRestaurant(Request $request)
    {
        $restaurant = new Restaurant;
        $restaurant -> name = $request -> name;
        $restaurant -> description = $request -> description;
        $restaurant -> save();

        return response()->json([
            "status" => "Success",
        ], 200);
    }

    public function getRestaurants()
    {
        $restos = Restaurant::all();
        return response()->json([
            "status" => "Success",
            "restaurants" => $restos
        ], 200);
    }
}
