@extends('layouts.admin')

@section('content')
<div class="container-fluid p-0">
  <h1 class="h3 mb-3">Comments</h1>

  <div class="row">
    <div class="col-12 col-lg-8 col-xxl-9 d-flex">
      <div class="card flex-fill table-responsive">
        <div class="card-header">

          <h5 class="card-title mb-2">All comments</h5>
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
              <th>Post ID</th>
              <th>User</th>
              <th>Comment</th>
              <th>Date</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
            @foreach($comments as $comment)
            <tr>
              <td>{{$loop->index +1}}</td>
              <td>{{$comment->post_id}}</td>
              <td>{{$comment->author}}</td>
              <td>{{$comment->content}}</td>
              <td>{{$comment->created_at}}</td>
              <td><a href="{{route('admin.comments.delete',['id'=>$comment->id])}}" class="btn btn-danger">Delete</a></td>
            </tr>
            @endforeach

          </tbody>
          <tfoot>
            <tr>
              <td colspan="5">


                {{ $comments->links('vendor.pagination.bootstrap-4') }}

              </td>
            </tr>
          </tfoot>
        </table>

      </div>
    </div>

  </div>

</div>
@endsection