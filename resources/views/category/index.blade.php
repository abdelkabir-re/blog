@extends('layouts.navbar');

@section('title')
    indexCategory
@endsection
@section('content')
    <div class="card">
        <div style="display:flex;justify-content: space-between;" class="card-header" >
         <p>Category Details:</p>
         <a href="{{route("category.create")}}" class="btn btn-primary" >Add Category</a>
        </div>
        <div class="card-body">
         <table class="table table-dark table-striped">
            <thead>
                <th>Id</th>
                <th>Name</th>
                <th>Actions</th>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td>
                        <a href="{{route('category.edit',$category->id)}}" class="btn btn-success" >Edit</a>
                        <form style="display: inline-block" method="POST" action="{{route("category.destroy",$category->id)}}">
                            @csrf
                            @method("delete")
                            <button onclick="return confirmDelete()" type="submit" class="btn btn-danger">delete</button>
                        </form>
                        
                    </td>
                </tr>
                @endforeach
                
            </tbody>
         </table>
        </div>
    </div>
    <script>
        function confirmDelete(){
            return confirm("are you sure to delete this item");
        }
    </script>
@endsection