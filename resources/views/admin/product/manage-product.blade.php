@extends('admin.master')
@section('title')
MANAGE
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="wel">
        @if ($message=Session::get('message'))
                <h2 id='xyz' class="text-center text-success">{{$message}}</h2>
            @endif
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">SI NO</th>
                  <th scope="col">Category Name</th>
                  <th scope="col">Brand Name</th>
                  <th scope="col">Product Name</th>
                  <th scope="col">Product Image</th>
                  <th scope="col">Product Price</th>
                  <th scope="col">Product Quantity</th>
                  <th scope="col">Publication Status</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              @php ($i=1)
              @foreach ($products as $product)
              <tbody>
                <tr>
                  <td>{{$i++}}</td>
                  <td>{{$product->category_name}}</td>
                  <td>{{$product->brand_name}}</td>
                  <td>{{$product->product_name}}</td>
                  <td>
                      <img src="{{asset($product->product_image)}}" alt="" height="70" width="70">
                  </td>
                  <td>{{$product->product_price}}</td>
                  <td>{{$product->product_quantity}}</td>
                  <td>{{$product->publication_status}}</td>
                  <td>demo</td>
                </tr>
              </tbody>
              @endforeach
            </table>
        </div>
    </div>
</div>
@endsection