<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function addAdmin(Request $request)
    {
        $admin = new Admin;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->save();

        return response()->json([
            "status" => "Success",
        ], 200);
    }

    public function adminLogin(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $admin = Admin::where('email', '=', $email)->first();

        if (Hash::check($password, $admin->password)) {
            return response()->json([
                "status" => "Success",
                "user_id" => $admin->admin_id
            ], 200);
        }
        return response()->json([
            "status" => "Access denied"
        ], 403);
    }
}
