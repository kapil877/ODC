@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left"><h2>Product category</h2></div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('category.create') }}"> Create New Category</a>
            </div>
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
            <th>Discount %</th>
            <th>Offer</th>
            <th width="280px">Action</th>
        </tr>

        @foreach($categories as $cat)
        <tr>
            <td>{{$cat->categoryname}}</td>
            <td>{{$cat->discount}} %</td>
            <td>@if($cat->status != NULL)On @else Off @endif</td>
            <td><a class="btn btn-primary" href="{{ route('category.edit',$cat->id) }}?id={{$cat->id}}">Edit</a>
            </td>
        </tr>

        @endforeach
    </table>
      
      {!! $categories->links() !!}
</div>

@endsection
