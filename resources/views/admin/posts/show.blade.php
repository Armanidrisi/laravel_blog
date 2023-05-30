@extends('layouts.admin')

@section('content')
<div class="container-fluid p-0">

  <div class="d-flex justify-content-between">
    <h1 class="h3 mb-3">Posts</h1>
    <a class="btn btn-primary mb-3" href="{{route('admin.posts.create')}}">Add</a>
  </div>
  <div class="row">
    <div class="col-12 col-lg-8 col-xxl-9 d-flex">
      <div class="card flex-fill table-responsive">
        <div class="card-header">

          <h5 class="card-title mb-2">All Posts</h5>
          @if(session('success'))
          <h5 class="mb-0 text-success">  {{ session('success') }}</h5>
          @endif
          @if(session('error'))
          <h5 class="mb-0 text-danger">  {{ session('error') }}</h5>
          @endif

        </div>
        <table class="table table-hover my-0">
          <thead>
            <tr>
              <th>#</th>
              <th>Title</th>
              <th>Slug</th>
              <th>Category</th>
              <th>Image</th>
              <th>Date</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
            @foreach($posts as $post)
            <tr>
              <td>{{$loop->index+1}}</td>
              <td>{{$post->title}}</td>
              <td>{{$post->slug}}</td>
              <td>{{$post->category->name}}</td>
              <td>{{$post->image}}</td>
              <td>{{$post->created_at}}</td>
              <td><a class="btn btn-primary" href="{{ route('admin.posts.edit', ['id' => $post->id]) }}">Edit</a></td>
              <td><a href="{{route('admin.posts.delete',['id'=>$post->id])}}" class="btn btn-danger">Delete</a></td>
            </tr>
            @endforeach

          </tbody>
          <tfoot>
            <tr>
              <td colspan="5">


                {{ $posts->links('vendor.pagination.bootstrap-4') }}

              </td>
            </tr>
          </tfoot>
        </table>

      </div>
    </div>

  </div>

</div>
@endsection