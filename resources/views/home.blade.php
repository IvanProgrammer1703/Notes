@extends('layouts.app')

@section('content')
<div class="container">
    <form class="form-inline" action="{{route('home.index')}}" method="GET">
        @csrf
        <div class="form-group mx-sm-2 mb-2">
            <label for="searchinput" class="sr-only">Search</label>
            <input type="text" class="form-control" id="searchinput" placeholder="enter query" name="search" required>
        </div>
        <div class="form-group mx-sm-2 mb-2">
        <select class="form-control" name="category">
            <option></option>
            @if($categories)
                @foreach ($categories as $category)
                    <option id="category-{{$category->id}}" value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            @endif
        </select>
        </div>
        <button type="submit" class="btn btn-dark mb-2">search</button>
    </form>
    <form class="form-inline" action="{{route('home.index')}}" method="GET">
      @csrf
        <button type="submit" class="btn btn-dark mb-2">all view</button>
    </form>
    <p>
      <a class="btn btn-light btn-lg" style="width:100%;" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
          <b>+</b>
      </a>
    </p>
    <div class="collapse" id="collapseExample">
      <div class="card card-body">
          <form action={{route('home.store')}} method="POST">
            @csrf
              <div class="form-group">
                  <label for="noteName">Name</label>
                  <input type="text" class="form-control" id="noteName" placeholder="Enter name note" name="name" required>
                  <small class="form-text text-muted"><span style="color:red;">WARNING : </span>Try not to make the same name, it is not prohibited, but you can get confused</small>
              </div>
              <div class="form-group">
                  <label for="exampleFormControlNote">Note</label>
                  <textarea class="form-control" id="exampleFormControlNote" name="note" rows="3" placeholder="Enter Note" required></textarea>
              </div>
              <div class="form-group">
                  <label for="js-test-type">Type</label>
                  <select class="form-control" id="js-test-type" name="type" required>
                    <option></option>
                      @foreach ($types as $type)
                      <option id="type-{{$type->id}}" value="{{$type->id}}">{{$type->name}}</option>
                      @endforeach
                  </select>
              </div>
              <div class="form-group" id="noteDate_block" style="display:none;">
                  <label for="noteDate">Deadline</label>
                  <input type="date" class="form-control" id="noteDate" name="deadline" placeholder="Enter name note">
              </div>
              <div class="form-group" id="categories_block" style="display: none;">
                  <label>categories</label>
                  <select class="form-control" name="category">
                    <option></option>
                    @if($categories)
                        @foreach ($categories as $category)
                            <option id="category-{{$category->id}}" value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    @endif
                    </select>
                    <label for="exampleFormControlLabel">Labels</label>
                    <textarea class="form-control" id="exampleFormControlLabel" name="label" rows="3" placeholder="Enter labels"></textarea>
              </div>
              <button type="submit" class="btn btn-dark">Добавить</button>
          </form>
      </div>
    </div>
    <br />
        @foreach ($notes as $note)
    <div class="card">
        <div class="card-header">
           {{__('welcome.notes')}}
        </div>
        <div class="card-body">
            <h5 class="card-title">{{$note->name}}</h5>
            <p class="card-text">{{$note->note}}</p>
            <p class="card-text" style="color:gray;">type : {{$note->type->name}}</p>
            @if($note->deadline != 'not marked')
            <p class="card-text" style="color:gray;">deadline : {{$note->deadline}}</p>
            @endif
            @if($note->category)
            <p class="card-text" style="color:gray;">category :
                {{$note->category->name}}
            </p>
            @endif
            @if ($note->label != 'no labels')
            <p class="card-text" style="color:gray;">labels : {{$note->label}}</p>
            @endif
            <form action="{{route('home.destroy',$note->id)}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-dark")>Delete</button>
            </form>
        </div>
    </div>
    <br />
        @endforeach
</div>
@endsection
