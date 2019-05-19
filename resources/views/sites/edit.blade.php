@extends('layouts.app')

@section('content')
<h1>Edit the site</h1>
{!! Form::open(['action' => ['SitesController@update' , $site->id], 'method' => 'POST']) !!}
<div class="form-group">
    {{Form::label('domain_name','Domain_name')}}
    {{Form::text('domain_name', $site->domain_name,['class' => 'form-control', 'placeholder' => 'domain_name'])}}

</div>
<div class="form-group">
    {{Form::label('sever','Server')}}
    {{Form::text('server', $site->server,['class' => 'form-control', 'placeholder' => 'server'])}}
</div>
    <a href="http://localhost/lsapp/public/sites" class="btn btn-primary">CANCEL</a> 
    {{Form::hidden('_method','PUT')}}
    {{Form::submit('submit' ,['class'=>'btn btn-danger'])}}
{!! Form::close() !!}
@endsection