@extends('layouts.app')

@section('title', 'List Products')

@section('content')
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">


<table class="table">
    <thead>
        <tr>
            <th scope="col" colspan="5">List All Products</th>
            <th>
                <button type="submit" class="btn btn-primary" onClick="window.location='{{ url('/create') }}'">Add New
                    Product</button>
            </th>
        </tr>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Product Name</th>
            <th scope="col">Description</th>
            <th scope="col">Image</th>
            <th scope="col">Variants</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $k=>$product)

        <tr>
            <th scope="row">{{$k+1}}</th>
            <td>
                {{$product->title}}
            </td>
            <td>{{$product->description}}
            </td>
            <td><img src="{{ asset('storage/images/'.$product->image) }}" width="100px" height="100px" />
            </td>
            <td>Size: {{$product->variants['size']}} , Color: {{$product->variants['color']}}
            </td>
            <td><a href="/view/{{$product->id}}">
                    View
                </a> | <a href="/edit/{{$product->id}}">
                    Edit
                </a> | <a href="/delete/{{$product->id}}">
                    Delete
                </a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection