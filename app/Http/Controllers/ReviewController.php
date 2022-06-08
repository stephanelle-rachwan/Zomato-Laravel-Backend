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
            ->select('reviews.content', 'reviews.status', 'reviews.rating', 'users.email', 'restaurants.name', 'reviews.review_id')
            ->where('reviews.status', '=', 2) //returning only pending reviews
            ->get();
        return response()->json([
            "status" => "Success",
            "reviews" => $reviews
        ], 200);
    }

    public function adminUpdateReview(Request $request, $id)
    {
        $review_id = $id;
        $affectedRows = Review::where("review_id", "=", $review_id)->update([
            "status" => $request->status,
        ]);
        return response()->json([
            "status1" => "success",
            "affected_rows" => $affectedRows
        ], 200);
    }

    public function getReviews($rest_id)
    {
        $reviews = Review::where('restaurant_id', '=', $rest_id)
            ->where('status', '=', 1)
            ->get();
        return response()->json([
            "status" => "Success",
            "reviews" => $reviews
        ], 200);
    }

    public function addReview(Request $request)
    {
        $review = new Review;
        $review->content = $request->content;
        $review->status = $request->status;
        $review->rating = $request->rating;
        $review->restaurant_id = $request->restaurant_id;
        $review->user_id = $request->user_id;
        $review->save();

        return response()->json([
            "status" => "Success",
        ], 200);
    }
}
