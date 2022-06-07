<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // for hashing passwords
use App\Models\User;

class UserController extends Controller
{
    public function adminGetUsers()
    {
        $users = User::all();
        return response()->json([
            "status" => "success",
            "users" => $users
        ], 200);
    }

    public function getUser($id)
    {
        $user = User::where('user_id', '=', $id)->first();
        return response()->json([
            "status" => "success",
            "users" => $user
        ], 200);
    }

    public function updateUser(Request $request)
    {
        $user_id = $request->user_id;
        $affectedRows = User::where("user_id", "=", $user_id)->update([
            "name" => $request->name,
            "email" => $request->email
        ]);
        return response()->json([
            "status" => "success",
            "affected_rows" => $affectedRows
        ], 200);
    }

    public function addUser(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->dob = $request->dob;
        $user->gender = $request->gender;
        $user->save();

        return response()->json([
            "status" => "Success",
        ], 200);
    }

    public function loginUser(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $user = User::where('email', '=', $email)->first();

        if (Hash::check($password, $user->password)) {
            return response()->json([
                "status" => "Success",
                "user_id" => $user->user_id
            ], 200);
        }
        return response()->json([
            "status" => "Access denied"
        ], 403);
    }
}
