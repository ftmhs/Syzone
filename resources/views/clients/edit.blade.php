@extends('layouts.app')

@section('content')
<h1>Edit the client</h1>
{!! Form::open(['action' => ['ClientsControler@update' , $client->id], 'method' => 'POST']) !!}
<div class="form-group">
    {{Form::label('name','Client Name')}}
    {{Form::text('name','',['class' => 'form-control', 'placeholder' => 'name'])}}

</div>
<div class="form-group">
    {{Form::label('phone','Phone')}}
    {{Form::number('phone',$client->phone,['class' => 'form-control', 'placeholder' => 'phone number'])}}
</div>
<div class="form-group">
    {{Form::label('email','Email')}}
    {{Form::email('email',$client->email,['class' => 'form-control', 'placeholder' => 'exemple@gmail.com'])}}
</div>
<div class="form-group">
        {{Form::label('contact','Contact')}}
        {{Form::text('contact',$client->contact,['class' => 'form-control', 'placeholder' => 'contact'])}}
    </div>
    <a href="http://localhost/lsapp/public/clients" class="btn btn-primary">CANCEL</a> 
    {{Form::hidden('_method','PUT')}}
    {{Form::submit('submit' ,['class'=>'btn btn-danger'])}}
{!! Form::close() !!}
@endsection