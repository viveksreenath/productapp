@extends('layouts.app')

@section('title', 'Edit Product Details')

@section('content')
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">


<table class="table">
    <thead>
        <tr>
            <th scope="col">Edit Product Details</th>
            <th>
                <button type="submit" class="btn btn-primary" onClick="window.location='{{ url('/') }}'">Products
                    List</button> <button type="submit" class="btn btn-primary"
                    onClick="window.location='{{ url('/create') }}'">Add New
                    Product</button>
            </th>
        </tr>
    </thead>
    <tbody>
        <form name="edit-product-form" enctype="multipart/form-data" id="edit-product-form" method="post"
            action="{{url('update')}}">
            @csrf
            <tr>
                <td>
                    Title
                </td>
                <td><input type="text" id="title" name="title" required="" value="{{$product->title}}">
                </td>
            </tr>
            <tr>
                <td>
                    Description
                </td>
                <td>
                    <textarea name="description" class="form-control" required="">{{$product->description}}</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Image
                </td>
                <td><img src="{{ asset('storage/images/'.$product->image) }}" width="100px" height="100px" /><input
                        type="file" name="image">
                </td>
            </tr>
            <tr>
                <td>
                    Size
                </td>
                <td><input type="number" id="size" name="size" required value="{{$product->variants['size']}}">
                </td>
            </tr>
            <tr>
                <td>
                    Color
                </td>
                <td><input type="text" id="color" name="color" required value="{{$product->variants['color']}}">
                </td>
            </tr>
            <tr>
                </td>
                <td>
                <td><input type="hidden" id="id" name="id" required="" value="{{$product->id}}">
                    <button type="submit" class="btn btn-primary">Update</button>
                </td>
            </tr>
        </form>
    </tbody>
</table>
@endsection