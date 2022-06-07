<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\DB; //get the DB so we can user the join query

class ReviewController extends Controller
{
    public function adminGetReviews()
    {
        $reviews = DB::table('reviews')
            ->join('users', 'users.user_id', '=', 'reviews.user_id')
            ->join('restaurants', 'restaurants.restaurant_id', '=', 'reviews.restaurant_id')
            ->select('reviews.content', 'reviews.status', 'reviews.rating', 'users.email', 'restaurants.name')
            ->get();
        return response()->json([
            "status" => "Success",
            "reviews" => $reviews
        ], 200);
    }

    public function adminUpdateReview()
    {

    }

    public function getReviews()
    {

    }
    
    public function addReview(Request $request)
    {
        $review = new Review;
        $review -> content = $request -> content;
        $review -> status = $request -> status;
        $review -> rating = $request -> rating;
        $review -> restaurant_id = $request -> restaurant_id;
        $review -> user_id = $request -> user_id;
        $review -> save();

        return response()->json([
            "status" => "Success",
        ], 200);
    }
}
