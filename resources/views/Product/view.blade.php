@extends('layouts.app')

@section('title', 'View Product')

@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">


<table class="table">
    <thead>
        <tr>
            <th scope="col" colspan="3">Show Product Details</th>
            <th>
                <button type="submit" class="btn btn-primary" onClick="window.location='{{ url('/') }}'">Products
                    List</button>
                <button type="submit" class="btn btn-primary" onClick="window.location='{{ url('/create') }}'">Add New
                    Product</button>
            </th>
        </tr>
        <tr>
            <th scope="col">Product Name</th>
            <th scope="col">Description</th>
            <th scope="col">Image</th>
            <th scope="col">Variants</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                {{$product->title}}
            </td>
            <td>{{$product->description}}
            </td>
            <td>@if(isset($product->image))<img src="{{ asset('storage/images/'.$product->image) }}" width="100px"
                    height="100px" />
                @endif
            </td>
            <td>Size: {{$product->variants['size']}} , Color: {{$product->variants['color']}}
            </td>
        </tr>
    </tbody>
</table>
@endsection