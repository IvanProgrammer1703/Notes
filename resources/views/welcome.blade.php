@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbotron">
        <h1 class="display-4">Notes</h1>
        <p class="lead">{{__('welcome.credit_work')}}</p>
        <hr class="my-4">
        <p><span style="color:red;">{{__('welcome.warning')}}:</span>{{__('welcome.disclaimer')}}</p>
        <hr class="my-4">
        <p><span style="color:yellow;">{{__('welcome.importantly')}}:</span>{{__('welcome.authorize')}}</p>
        <p class="lead">
            <a class="btn btn-dark btn-lg" href="https://vk.com/programmerivan" role="button">{{__('welcome.featback')}}</a>
        </p>
    </div>
    <div class="jumbotron">
        <h1 class="display-4">{{__('welcome.new')}}</h1>
            <p class="lead">{{__('welcome.new_description')}}</p>
            <hr class="my-4">
            <ul>

            <li>
                <p>
                    {{__('welcome.new_one')}}
                </p></li>
            <li>
                <p>{{__('welcome.new_two')}}<b style="color:blue;">{{__('welcome.for_admin')}}</b></p>
            </li>
            </ul>
    </div>
</div>
@endsection
