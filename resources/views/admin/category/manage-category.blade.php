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
                  <th scope="col">Category Description</th>
                  <th scope="col">Publication Status</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              @php ($i=1)
              @foreach ($categories as $category)
              <tbody>
                <tr>
                  <td>{{$i++}}</td>
                  <td>{{$category->category_name}}</td>
                  <td>{{$category->category_description}}</td>
                  <td>{{$category->publication_status == 1 ? 'published' :'unpublished'}}</td>
                  <td>
                      @if($category->publication_status==1)
                      <a href="{{route('category/unpublished', ['id'=>$category->id])}}" class="btn btn-info btn-sm">
                        <span class=""><i class="fa fa-arrow-up" aria-hidden="true"></i></span>
                      </a>
                     @else
                      <a href="{{route('category/published',['id'=>$category->id])}}" class="btn btn-warning btn-sm">
                        <span class=""><i class="fa fa-arrow-down" aria-hidden="true"></i></span>
                      </a>
                    @endif
                      <a href="{{route('category/edit', ['id'=>$category->id])}}" class="btn btn-success btn-sm">
                        <span class=""><i class="fas fa-edit "></i></i></span>
                      </a>

                      <a href="{{route('category/delete', ['id'=>$category->id])}}" class="btn btn-danger btn-sm">
                        <span class=""><i class="fas fa-trash    "></i></i></span>
                      </a>
                  </td>
                </tr>
              </tbody>
              @endforeach
            </table>
        </div>
    </div>
</div>
@endsection