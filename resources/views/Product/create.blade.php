@extends('layouts.app')

@section('title', 'Add Product')

@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<table class="table">
    <thead>
        <tr>
            <th scope="col">Add Product</th>
            <th>
                <button type="submit" class="btn btn-primary" onClick="window.location='{{ url('/') }}'">Products
                    List</button>
            </th>
        </tr>
    </thead>
    <tbody>
        <form name="add-product-form" id="add-product-form" enctype="multipart/form-data" method="post"
            action="{{url('add')}}">
            @csrf
            <tr>
                <td>
                    Title
                </td>
                <td><input type="text" id="title" name="title" required="" value="">
                </td>
            </tr>
            <tr>
                <td>
                    Description
                </td>
                <td>
                    <textarea name="description" class="form-control" required=""></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Image
                </td>
                <td><input type="file" name="image"></td>
            </tr>
            <tr>
                <td>
                    Size
                </td>
                <td><input type="number" id="size" name="size" required="" value="">
                </td>
            </tr>
            <tr>
                <td>
                    Color
                </td>
                <td><input type="text" id="color" name="color" required="" value="">
                </td>
            </tr>
            <tr>
                </td>
                <td>
                <td>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </td>
            </tr>
        </form>
    </tbody>
</table>
@endsection