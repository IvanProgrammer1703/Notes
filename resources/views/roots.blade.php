@extends('layouts.app')

@section('content')
<div class="container">

    <div class="jumbotron">
        <h1 class="display-4">Cotegory</h1>
        <p>
            <a class="btn btn-light btn-lg" style="width:100%;" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                <b>+</b>
            </a>
        </p>
        <div class="collapse" id="collapseExample">
            <div class="card card-body">
                <form action={{url('root')}} method="POST">
                    @csrf
                    <div class="form-group row">
                        <label for="inputCategoryName" class="col-sm-2 col-form-label">Category name</label>
                        <div class="col-sm-10">
                            <input type="text" name="category_name" class="form-control" id="inputCategoryName" placeholder="Place enter category name" required>
                        </div>
                    </div>
                     <button type="submit" class="btn btn-dark">Добавить</button>
                </form>
            </div>
            <br />
        </div>
        @foreach ($categories as $category)
        <div class="card">
            <div class="card-header">
                Categories #{{$category->id}}
            </div>
            <div class="card-body">
                <h5 class="card-title"> Название категории: <b>{{$category->name}}</b></h5>
                <form action="{{route('root.destroy',$category->id)}}" method="POST">
                    @method('DELETE')
                    @csrf
                    @if($category->id != '0')
                    <button type="submit" class="btn btn-dark")>Delete Category</button>
                    @endif
                </form>
            </div>
        </div>
        <br />
        @endforeach
    </div>
</div>
@endsection
