<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Type;
use App\Note;
use App\Category;

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
    public function index(Request $request)
    {
        if(!empty($request->input('search'))){

            $question = '%'.$request->input('search').'%'; // добавляем % что бы искать не только по всей строке но и по фрагменту.
            $categories = Category::orderBy('id','desc')->get();
            $notes = Note::where('note','LIKE',$question)
            -> orWhere('label','LIKE',$question)
            ->get();

            if(!empty($request->input('category'))){
                $notes = $notes->where('category_id','=',$request->input('category'));
            }



            $types = Type::orderBy('id', 'desc')->get();

            return view('home',compact('types','notes','categories'));
        } else {

            $categories = Category::orderBy('id','desc')->get();
            $types = Type::orderBy('id', 'desc')->get();
            $notes = Note::orderBy('id','desc')->get();

            return view('home',compact('types','notes','categories'));
        }
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
         if($request->input('category')){

            $note->category_id = $request->input('category');
         } else {
            $note->category_id = '0';
         }
         if($request->input('label')){

            $note->label = $request->input('label');
         } else {
            $note->label = 'no labels';
         }
         $note->save();

        return redirect()->back();
    }
     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $note = new Note();

        $note->where('id','=',$id)->delete();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {

    }


}
