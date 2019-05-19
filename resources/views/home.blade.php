@extends('layouts.app')

@section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-md-8">
<div class="card">
<div class="card-header">Dashboard</div>

<div class="card-body">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <a href="http://localhost/lsapp/public/clients/create" class="btn btn-primary">Add client</a> 
    <hr>
    Welcome To Your Page
</div>          

        @if(count($clients) > 0)
        <table class="table table-striped"> 
                <tr>
                    <th><h2>Id </h2></th> <th><h2> Name </h2></th> <th><h2> Phone number  </h2></th> <th><h2> Contact </h2></th> <th></th> <th></th>
                        </tr>
                @foreach($clients as $client)
                    <div class="well">
                <tr>
        <th> <h3> <a href="http://localhost/lsapp/public/clients/{{$client->id}}">{{$client->id}}  </a></h3></th>
        <th> <h3> <a href="http://localhost/lsapp/public/clients/{{$client->id}}">{{$client->name}}  </a></h3></th>
                    <th> {{$client->phone}}  </th>
                    <th> {{$client->contact}} </th>
                    <th><a href="http://localhost/lsapp/public/clients/{{$client->id}}/edit" class="btn btn-primary">Edit</a>  </th>
                        </tr>
                    @endforeach
                    </table>
                    </div>
            @else
            <p>You have no client Add them. </p>
        @endif
                </table>    
            </div>
        </div>
    </div>
</div>
@endsection
