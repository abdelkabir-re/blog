@extends('layouts.navbar');

@section('title')
    indexProducts
@endsection
@section('content')
    <div class="card">
        <div style="display:flex;justify-content: space-between;" class="card-header" >
         <p>Products Details:</p>
         <a href="{{route("products.create")}}" class="btn btn-primary" >Add Product</a>
        </div>
        <div class="card-body">
         <table class="table table-dark table-striped">
            <thead>
                <th>Id</th>
                <th>Name</th>
                <th>Category</th>
                <th>Actions</th>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->category->name}}</td>
                    
                    <td>
                        <a href="{{route("products.edit",$product->id)}}" class="btn btn-success" >Edit</a>
                        <form style="display: inline-block" method="POST" action="{{route("products.destroy",$product->id)}}">
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