<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        $count = DB::table('users')->where("userType", "=", "admin")->count();
        if ($count == 0) {
            $newUser = new Users();
            $newUser->username = "admin";
            $newUser->password = Hash::make("admin123");
            $newUser->userType = "admin";
            $newUser->status = "active";
            $newUser->save();
        }
        if (session()->exists("users")) {
            $user = session()->pull("users");
            session()->put("users", $user);

            if ($user['userType'] == "admin") {
                return redirect("/admin");
            } else {
                session()->pull("users");
            }
        }
        return view("admin.home");
    }

    public function store(Request $request)
    {
        if ($request->btnLogin) {
            $data = json_decode(DB::table("users")->where("username", '=', $request->username)->get(), true);
            $isUserFound = false;
            foreach ($data as $d) {
                if (password_verify($request->password, $d['password'])) {
                    session()->put("users", $d);
                    session()->put("successLogin", true);
                    $isUserFound = true;
                    break;
                }
            }

            if (!$isUserFound) {
                session()->put("errorLogin", true);
            } else {
                return redirect("/admin");
            }
            return redirect("/login");
        }
        return redirect("/");
    }
}
