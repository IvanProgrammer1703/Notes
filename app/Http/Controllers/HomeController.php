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
        $types = Type::orderBy('id', 'desc')->get();
        $notes = Note::orderBy('id','desc')->get();
        return view('home',compact('types','notes'));
    }

}
