@extends('layouts.navbar');

@section('title')
    CreateProduct
@endsection
@section('content')
    <div class="card w-75 m-auto p-2">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form method="POST" action="{{route('products.store')}}">
            @csrf
            <div class="mb-3" style="margin-bottom: 7px">
                <label  class="form-label">Category:</label>

                <select name="category_id" class="form-select" aria-label="Default select example">
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
              <label  class="form-label">Name Product:</label>
              <input name="name"  class="form-control" >
            </div>
            <div class="mb-3">
              <label  class="form-label">Price Product:</label>
              <input name="price" type="number"  class="form-control" >
            </div>
            <button type="submit" class="btn btn-primary">create</button>
        </form>
        
    </div>
@endsection