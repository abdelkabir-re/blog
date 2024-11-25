@extends('layouts.navbar');

@section('title')
    CreateCategory
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
        <form method="POST" action="{{route('category.store')}}">
            @csrf
            <div class="mb-3">
              <label  class="form-label">Name</label>
              <input name="name"  class="form-control" >
            </div>
            <button type="submit" class="btn btn-primary">create</button>
        </form>
        
    </div>
@endsection