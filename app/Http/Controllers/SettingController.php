<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // list of prebuild setting
        $courselevels = DB::table('levels')->pluck('name', 'id');
        $coursecategories = DB::table('categories')->pluck('name', 'id');
        return view('setting',compact('courselevels','coursecategories'));
    }

    // one function for cat
    public function store_cat(Request $request)
    {
        // save category
        $param = $request->all();
        $category = DB::table('categories')->insert(
            ['name' => $param['name']]
        );
        return back()->with('status', 'Categories Added!');

    }
    // one function for cat
    public function store_lev(Request $request)
    {
        // save category
        $param = $request->all();
        $category = DB::table('levels')->insert(
            ['name' => $param['name']]
        );
        return back()->with('status', 'Level Added!');

    }
    // one funciton for level
}
