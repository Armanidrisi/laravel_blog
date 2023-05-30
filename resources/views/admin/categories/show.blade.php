@extends('layouts.admin')

@section('content')
<div class="container-fluid p-0">

  <div class="d-flex justify-content-between">
    <h1 class="h3 mb-3">Categories</h1>
    <a class="btn btn-primary mb-3" href="{{route('admin.categories.create')}}">Add</a>
  </div>
  <div class="row">
    <div class="col-12 col-lg-8 col-xxl-9 d-flex">
      <div class="card flex-fill table-responsive">
        <div class="card-header">

          <h5 class="card-title mb-2">All categories</h5>
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
              <th>Name</th>
              <th>Date</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
            @foreach($categories as $category)
            <tr>
              <td>{{$loop->index +1}}</td>
              <td>{{$category->name}}</td>

              <td>{{$category->created_at}}</td>
              <td><a class="btn btn-primary" href="{{ route('admin.categories.edit', ['id' => $category->id]) }}">Edit</a></td>
              <td><a href="{{route('admin.categories.delete',['id'=>$category->id])}}" class="btn btn-danger">Delete</a></td>
            </tr>
            @endforeach

          </tbody>
          <tfoot>
            <tr>
              <td colspan="5">


                {{ $categories->links('vendor.pagination.bootstrap-4') }}

              </td>
            </tr>
          </tfoot>
        </table>

      </div>
    </div>

  </div>

</div>
@endsection