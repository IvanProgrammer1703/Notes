<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Type;
use App\Note;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $notes = Type::find(1)->type_name;
        $types = Type::orderBy('id', 'desc')->get();
        //$notes = Note::orderBy('id','desc')->get();
        return view('home',compact('types','notes'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $note = new Note();
         $note->name = $request->input('name');
         $note->note = $request->input('note');
         $note->type_id = $request->input('type');
         if($request->input('deadline')){
             $note->deadline = $request->input('deadline');
         }
         $note->save();

        return redirect()->back();
    }

}
