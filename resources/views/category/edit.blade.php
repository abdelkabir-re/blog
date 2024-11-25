@extends('layouts.navbar');

@section('title')
    EditCategory
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
        <form method="POST" action="{{route('category.update',$category->id)}}">
            @csrf
            @method('put')
            <div class="mb-3">
              <label  class="form-label">Name</label>
              <input name="name" value={{$category->name}} class="form-control" >
            </div>
            <button type="submit" class="btn btn-success">update</button>
        </form>
        
    </div>
@endsection