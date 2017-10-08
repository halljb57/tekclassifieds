@extends('layouts.app')
@section('title', 'Home')
@section('content')


    <div class="panel panel-default">

        <div class="panel-heading">
            <h3 class="panel-title">TekClassifieds Main</h3>
        </div>

        <div class="panel-body">
            <div class="row">
                @foreach($classifieds as $class)
                    <div class="col-md-4">
                        <img src="/images/{{$class->main_image }}" alt="" class="classifieds_image">
                        <a href="/classifieds/{!! $class->id !!}"><h4>{{$class->title }}</h4></a>
                        <h5>${{$class->price }}</h5>

                        <p>{{$class->description }}</p>
                    </div>
                @endforeach
            </div>
        </div>

    </div>

@stop
@section('sidebar')
    {{--Extendet sitebar--}}
    {{--@include('category.categoryList')--}}
@stop