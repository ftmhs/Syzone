@extends('layouts.app')

@section('content')
<h1>Create client</h1>
{!! Form::open(['action' => 'ClientsControler@store', 'method' => 'POST']) !!}
<div class="form-group">
    {{Form::label('name','Client Name')}}
    {{Form::text('name','',['class' => 'form-control', 'placeholder' => 'name'])}}

</div>
<div class="form-group">
    {{Form::label('phone','Phone')}}
    {{Form::number('phone','',['class' => 'form-control', 'placeholder' => 'phone number'])}}
</div>
<div class="form-group">
    {{Form::label('email','Email')}}
    {{Form::email('email','',['class' => 'form-control', 'placeholder' => 'exemple@gmail.com'])}}
</div>
<div class="form-group">
        {{Form::label('contact','Contact')}}
        {{Form::text('contact','',['class' => 'form-control', 'placeholder' => 'contact'])}}
    </div>
    {{Form::submit('submit' ,['class'=>'btn btn-primary'])}}
{!! Form::close() !!}
@endsection