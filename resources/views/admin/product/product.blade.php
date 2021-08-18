@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left"><h2>Product category</h2></div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('product.create') }}"> Create New Product</a>
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
            <th>image</th>
            <th>Price</th>
            <th>Category</th>
            <th>Tag</th>
            <th>Description</th>
            <th width="280px">Action</th>
        </tr>

        @foreach($product as $prd)

        <?php $catename =  \App\Models\Product::productcat($prd->id); ?>
        <tr>
            <td>{{$prd->name}}</td>
            <td><img src="{{asset('product_image/'.$prd->image)}}" alt="{{$prd->image}}" width="60px" height="auto"></td>
            <td>{{$prd->price}}</td>
            <td>{{$catename->categoryname}}</td>
            <td>{{$prd->tag}}</td>
            <td>{{$prd->description}}</td>
            <td><a class="btn btn-primary" href="{{ route('product.edit',$prd->id) }}">Edit</a>
            </td>
        </tr>

        @endforeach
    </table>
      
      {!! $product->links() !!}
</div>

@endsection
