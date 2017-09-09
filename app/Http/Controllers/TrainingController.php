<?php

namespace App\Http\Controllers;

use App\training;
use Illuminate\Http\Request;
use DB;
use Alert;

class TrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        // list all courses
        $courselevels = DB::table('levels')->pluck('name', 'id');
        $coursecategories = DB::table('categories')->pluck('name', 'id');
        $listofcourses = DB::table('trainings')
                        ->join('categories', 'trainings.category_id', '=', 'categories.id')
                        ->join('levels', 'trainings.level_id', '=', 'levels.id')
                        ->join('articles', 'trainings.article_id', '=', 'articles.id')
                        ->select('trainings.*', 'categories.name as cname', 'levels.name as lname', 'articles.content')
                        ->get();
        // dd($listofcourses);
        return view('course',compact('courselevels','coursecategories','listofcourses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $imgbackground = $request->file('background');
        $bckimgname = str_replace(' ', '_', $imgbackground->getClientOriginalName());

        $param = $request->all();
        $training = new Training;
        $training->category_id      = $param['category'];
        $training->name             = $param['name'];
        $training->level_id         = $param['level'];
        $training->description      = $param['description'];
        $training->duration         = $param['duration'];
        $training->price            = $param['price'];
        $articleid = DB::table('articles')->insertGetId(
            ['content' => $param['article']]
        );
        $training->article_id       = $articleid;
        $training->background       = $bckimgname;
        $training->save();

        $request->file('background')->move(base_path() . '/public/background/'.$training->id, $bckimgname);

        return back()->with('status', 'Course Added!');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\training  $training
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, training $training)
    {
        $param = $request->all();

        $training->category_id          = $param["category"];
        $training->name                 = $param["name"];
        $training->level_id             = $param["level"];
        $training->description          = $param["description"];
        $training->duration             = $param["duration"];
        $training->price                = $param["price"];
        DB::table('articles')->where('id', $training->article_id)->update(['content' => $param["article"]]);
        if ($request->file('background')) {
            $imgbackground              = $request->file('background');
            $bckimgname                 = str_replace(' ', '_', $imgbackground->getClientOriginalName());
            $training->background       = $bckimgname;
            $request->file('background')->move(base_path() . '/public/background/'.$training->id, $bckimgname);
        }
        $training->save();
        return back()->with('warning', 'Course Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\training  $training
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $training = Training::find($id);
        $training->delete();
        
        return back()->with('danger', 'Course Removed!');

    }
}
