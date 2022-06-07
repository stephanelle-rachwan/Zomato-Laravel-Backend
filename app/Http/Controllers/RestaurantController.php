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

    public function adminAddRestaurant()
    {
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
