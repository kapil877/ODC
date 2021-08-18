@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left"><h2>Users</h2></div>
        </div>
    </div>
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <th>Email</th>
        </tr>

        @foreach($allUser as $users)
        <tr>
            <td>{{$users->name}}</td>
            <td>{{$users->email}}</td>
        </tr>

        @endforeach
    </table>
      
      {!! $allUser->links() !!}
</div>

@endsection
