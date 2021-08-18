@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Category') }}</div>

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

            <form action="{{route('category.update',$categories->id)}}" method="POST">

                @csrf

                @method('PUT')

                <input type="hidden" name="upid" value="{{$categories->id}}">

                <div class="form-group">
                    <label for="categoryname">Name</label>
                    <input type="text" name="categoryname" class="form-control" value="{{$categories->categoryname}}">
                </div>

                <div class="form-group">
                    <label for="discount">Discount</label>
                    <input type="text" name="discount" class="form-control" value="{{$categories->discount}}">
                </div>

                <div class="form-group">
                    <label for="discountoffer">Discount offer : </label>
                    <input type="checkbox" name="discountoffer" data-toggle="toggle" data-size="sm" <?php if ($categories->status != NULL): echo "checked"; ?><?php endif ?>>
                </div>

                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-primary" value="Update">
                </div>
                
            </form>
        </div>
    </div>


</div>
@endsection
