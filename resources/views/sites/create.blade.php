@extends('layouts.app')
 
@section('content')
<h1>Create site</h1>
{!! Form::open(['action' => 'SitesController@store', 'method' => 'POST']) !!}
<div class="form-group">
    {{Form::label('domain_name','Doamin_name')}}
    {{Form::text('domain_name','',['class' => 'form-control', 'placeholder' => 'domain_name'])}}

</div>
<div class="form-group">
        {{Form::label('server','Server')}}
        {{Form::text('server','',['class' => 'form-control', 'placeholder' => 'server'])}}
    </div>
    {{Form::submit('submit' ,['class'=>'btn btn-primary'])}}
{!! Form::close() !!}

@endsection