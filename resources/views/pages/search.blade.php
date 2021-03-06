@extends('layouts.app')
@section('content')

<form action="{{ url('pages/search') }}" method="GET" role="search">
    <div class="input-group">
    <input type="text" class="form-control" name="q"
    placeholder="Search users"> <span class="input-group-btn">
    <button type="submit" class="btn btn-default">
    <span class="glyphicon glyphicon-search">Search</span>
    </button>
    </span>
    </div>
    </form>
    <div class="container">
        @if(isset($message))
            {{ $message }}
        @endif
        @if(isset($details))
            <p> The Search results for your query <b> {{ $query }} </b> are :</p>
        <h2>Sample User details</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach($details as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
   @endsection
    