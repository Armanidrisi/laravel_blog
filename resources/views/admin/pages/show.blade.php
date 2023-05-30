@extends('layouts.admin')

@section('content')
<div class="container-fluid p-0">

  <div class="d-flex justify-content-between">
    <h1 class="h3 mb-3">Pages</h1>
    <a class="btn btn-primary mb-3" href="{{route('admin.pages.create')}}">Add</a>
  </div>
  <div class="row">
    <div class="col-12 col-lg-8 col-xxl-9 d-flex">
      <div class="card flex-fill table-responsive">
        <div class="card-header">

          <h5 class="card-title mb-2">All pages</h5>
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
              <th>Visibility</th>
              <th>Date</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
            @foreach($pages as $page)
            <tr>
              <td>{{$loop->index+1}}</td>
              <td>{{$page->title}}</td>
              <td>{{$page->slug}}</td>
              <td><span class="badge {{$page->visibility==1?'bg-success':'bg-danger'}}">{{$page->visibility==1?'footer':'unlisted'}}</span></td>
              <td>{{$page->created_at}}</td>
              <td><a class="btn btn-primary" href="{{ route('admin.pages.edit', ['id' => $page->id]) }}">Edit</a></td>
              <td><a href="{{route('admin.pages.delete',['id'=>$page->id])}}" class="btn btn-danger">Delete</a></td>
            </tr>
            @endforeach

          </tbody>
          <tfoot>
            <tr>
              <td colspan="5">


                {{ $pages->links('vendor.pagination.bootstrap-4')}}
              </td>
            </tr>
          </tfoot>
        </table>

      </div>
    </div>

  </div>

</div>
@endsection