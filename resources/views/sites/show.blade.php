@extends('layouts.app')
@section('content')
<a href="http://localhost/lsapp/public/sites" class="btn btn-success" >>>Go back</a>
<h1>{{$site->domain_name}}</h1>
<div>
<h3>server name : {{$site->server}}</h3>
<small>created on {{$site->created_at}}</small>
</div>
<hr>
@if(!Auth::guest())
@if(Auth::user()->id == $site->user_id)
<a href="http://localhost/lsapp/public/sites/{{$site->id}}/edit" class="btn btn-primary">Edit</a>
{!!Form::open(['action' => ['SitesController@destroy', $site->id], 'method' => 'POST','class' => 'pull-right'])!!}
{{Form::hidden('_method','DELETE')}}
{{Form::submit('Delete',['class' =>'btn btn-danger'])}}
{!!Form::close() !!}
@endif
@endif
@endsection