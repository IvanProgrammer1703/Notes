@extends('layouts.app')

@section('content')
<div class="container">
    <p>
      <a class="btn btn-light btn-lg" style="width:100%;" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
          <b>+</b>
      </a>
    </p>
    <div class="collapse" id="collapseExample">
      <div class="card card-body">
          <form>
            @csrf
              <div class="form-group">
                  <label for="noteName">Name</label>
                  <input type="text" class="form-control" id="noteName" placeholder="Enter name note">
                  <small class="form-text text-muted"><span style="color:red;">WARNING : </span>Try not to make the same name, it is not prohibited, but you can get confused</small>
              </div>
              <div class="form-group">
                  <label for="exampleFormControlNote">Note</label>
                  <textarea class="form-control" id="exampleFormControlNote" rows="3" placeholder="Enter Note"></textarea>
              </div>
              <div class="form-group">
                  <label for="js-test-type">Type</label>
                  <select class="form-control" id="js-test-type">
                      <option selected="selected">Заметка</option>
                      @foreach ($types as $type)
                      <option id="type-{{$type->id}}">{{$type->name}}</option>
                      @endforeach
                  </select>
              </div>
              <div class="form-group" id="noteDate_block" style="display:none;">
                  <label for="noteDate">Deadline</label>
                  <input type="date" class="form-control" id="noteDate" placeholder="Enter name note">
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
            <p class="card-text" style="color:gray;">type : </p>
            @if ($note->deadline)
              <p class="card-text" style="color:gray;">deadline : {{$note->deadline}}</p>
            @endif
        </div>
    </div>
    <br />
        @endforeach
</div>
@endsection
