<?php

namespace App\Http\Controllers;

use App\Models\Assessments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (session()->exists("users")) {
            $user = session()->pull("users");
            session()->put("users", $user);

            if ($user['userType'] != "admin") {
                session()->put("unauthorized", true);
                return redirect("/admin");
            }
            $assessments = Assessments::orderBy('created_at', 'desc')->get();
            $answers = array();
            foreach ($assessments as $a) {
                $answers[$a['id']] = $a['wellBeingAnswers'];
            }
            return view("admin.admin", ["assessments" => $assessments, 'answers' => $answers]);
        }
        return redirect("/");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Request $request)
    {
        if (session()->exists("users")) {
            $user = session()->pull("users");
            session()->put("users", $user);

            if ($user['userType'] != "admin") {
                session()->put("unauthorized", true);
                return redirect("/admin");
            }

            if ($request->btnDeleteAssessment) {
                $deleteCount = DB::table("assessments")->where("id", '=', $id)->delete();
                if ($deleteCount > 0) {
                    session()->put("successDelete", true);
                } else {
                    session()->put("errorDelete", true);
                }
            }
            return redirect("/admin");
        }
        return redirect("/");
    }
}
