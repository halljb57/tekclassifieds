@extends('layouts.app')
@section('title', 'Show')
@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">{!! $classified->title !!}</h3>
        </div>
        <div class="panel-body">
            <div class="row">
               <div class="col-md-4">
                   <img src="/images/{!! $classified->main_image !!}" alt="">
                    <h3>Item Details</h3>

                   <ul class="list-group">
                       <li class="list-group-item">${!! $classified->price !!} </li>
                       <li class="list-group-item">Condition: {!! $classified->condition !!}</li>
                       <li class="list-group-item">Phone: {!! $classified->category->name !!}</li>


                   </ul>
                   <h3>Seller Details</h3>

                   <ul class="list-group">
                       <li class="list-group-item">Location: {!! $classified->location !!}</li>
                       <li class="list-group-item">Phone: {!! $classified->phone !!}</li>
                       <li class="list-group-item">Email: {!! $classified->email !!}</li>

                   </ul>
               </div>
                <div class="col-md-8">
                    <h3>Item Description</h3>
                    <p>{!! $classified->description !!}</p>
                </div>
            </div>
            @if((!Auth::guest()) and ( Auth::user()->id == $classified->owner_id))

            <div class="pull-right classified-controll">
                <a href="/classifieds/{!! $classified->id !!}/edit" class="btn btn-default">Edit</a>
                {!! Form::open(['method' => 'DELETE', 'route'=> ['classifieds.destroy', $classified->id]]) !!}
                {!! Form::submit('Delete', $attribues = ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            </div>

                @endif
        </div>
    </div>

@stop
