@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Category') }}</div>

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

            <form action="{{route('category.store')}}" method="POST">

                @csrf

                <div class="form-group">
                    <label for="categoryname">Name</label>
                    <input type="text" name="categoryname" class="form-control">
                </div>

                <div class="form-group">
                    <label for="discount">Discount</label>
                    <input type="text" name="discount" class="form-control">
                </div>

                <div class="form-group">
                    <label for="discountoffer">Discount offer : </label>
                    <input type="checkbox" name="discountoffer" checked data-toggle="toggle" data-size="sm">
                </div>

                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-primary" value="Add">
                </div>
                
            </form>
        </div>
    </div>


</div>
@endsection
