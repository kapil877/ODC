@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Product') }}</div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>


    <div class="row justify-content-center">
        <div class="col-md-8">

            <form action="{{route('product.update',$product->id)}}" method="POST" enctype="multipart/form-data">

                @csrf

                @method('PUT')

                <input type="hidden" name="upid" value="{{$product->id}}">

                <div class="form-group">
                    <label for="productname">Name</label>
                    <input type="text" name="productname" class="form-control" value="{{$product->name}}">
                </div>

                <div class="form-group">
                    <label for="category">Category</label>
                    <select class="form-control" name="category">
                    @foreach($categories as $cat)
                            <option value="{{$cat->id}}">{{$cat->categoryname}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" name="price" class="form-control" value="{{$product->price}}">
                </div>

                <div class="form-group">
                    <label for="tag">Tag</label>
                    <input type="text" name="tag" class="form-control" value="{{$product->tag}}">
                </div>

                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image" id="image">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                   <textarea class="form-control" name="description">{{$product->description}}</textarea>
                </div>

                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary">Update</button>
                </div>
                
            </form>
        </div>
    </div>


</div>
@endsection
