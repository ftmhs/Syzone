@extends('layouts.app')
@section('content')
<h1>Sites</h1>
@if(count($sites) > 0)
<table class="table table-striped"> 
    <tr>
       <th><h2>Id </h2></th> <th><h2> Domain_Name </h2></th> <th><h2>SERVER   </h2></th> <th><h2>Created at</h2></th> <th></th>
            </tr>
    @foreach($sites as $site)
    <div class="well">
        <tr>                  
            <th> <h3><a href="http://localhost/lsapp/public/sites/{{$site->id}}">{{$site->id}} </a></th>
                <th>   <a href="http://localhost/lsapp/public/sites/{{$site->id}}">{{$site->domain_name}}</a></h3></th> 
      
                <th> <h5>{{$site->server}} </h5></th> 
                <th>  {{$site->created_at}} </th>
                <th>@if(!Auth::guest())
                    @if(Auth::user()->id == $site->user_id)
                    <a href="http://localhost/lsapp/public/sites/{{$site->id}}/edit" class="btn btn-primary">Edit</a>  
                </th>
                @endif
                @endif
                {{$sites->links()}} </th>
        </div>
    @endforeach
    </tr>
</table>
    {{$sites->links()}}
@else
<p>No sites registered</p>
@endif
@endsection