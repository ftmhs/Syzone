@extends('layouts.app')

@section('content')
<h1>Clients</h1>

    @if(count($clients) > 0)
    <table class="table table-striped"> 
    <tr>
       <th><h2>Id </h2></th> <th><h2> Name </h2></th> <th><h2> Phone number  </h2></th> <th><h2> Contact </h2></th> <th></th> <th></th><th></th>
            </tr>
            @foreach($clients as $client)
                <div class="well">
          <tr>
    <th> <h3> <a href="http://localhost/lsapp/public/clients/{{$client->id}}">{{$client->id}}  </a></h3></th>
  <th> <h3> <a href="http://localhost/lsapp/public/clients/{{$client->id}}">{{$client->name}}  </a></h3></th>
               <th> {{$client->phone}}  </th>
                <th> {{$client->contact}} </th>
                <th> Created on {{$client->created_at}}</th>
                    <th> by {{$client->user->name}} </th>
                
                <th>@if(!Auth::guest())
                    @if(Auth::user()->id == $client->user_id)
                    <a href="http://localhost/lsapp/public/clients/{{$client->id}}/edit" class="btn btn-primary">Edit</a>  
                @endif
                @endif
                {{$clients->links()}} </th>
                 </tr>
                @endforeach
                
                </div>
            </table>
           
        @else
        <p>no clients registered</p>
    @endif
@endsection