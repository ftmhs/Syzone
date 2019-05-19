@extends('layouts.app')

@section('content')
<a href ="http://localhost/lsapp/public/clients" class="btn btn-success ">Go back</a>
<h1>{{$client->id}} : {{$client->name}} </h1>
<hr>
<h3>Phone number :{{$client->phone}}</h3>
<h3> Contact : {{$client->contact}} <h3>
    <h3>Email :  {{$client->email}}    </h3>

  <h6> Created on {{$client->created_at}} by user : {{$client->user->name}} </h6>
<hr>
@if(!Auth::guest())
@if(Auth::user()->id == $client->user_id)
  <a href="http://localhost/lsapp/public/clients/{{$client->id}}/edit" class="btn btn-primary">Edit</a>
  {!!Form::open(['action' => ['ClientsControler@destroy', $client->id], 'method' => 'POST','class' => 'pull-right'])!!}
  {{Form::hidden('_method','DELETE')}}
  {{Form::submit('Delete',['class' =>'btn btn-danger'])}}
  {!!Form::close() !!}
@endif
@endif
@endsection