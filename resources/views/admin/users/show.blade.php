@extends('layouts.admin')

@section('content')
<div class="container-fluid p-0">

  <div class="d-flex justify-content-between">
    <h1 class="h3 mb-3">Users</h1>
    <a class="btn btn-primary mb-3" href="{{route('admin.users.create')}}">Add</a>
  </div>
  <div class="row">
    <div class="col-12 col-lg-8 col-xxl-9 d-flex">
      <div class="card flex-fill table-responsive">
        <div class="card-header">

          <h5 class="card-title mb-2">All Users</h5>
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
              <th>Name</th>
              <th>Email</th>
              <th>Date</th>
              <th>Role</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
            @foreach($users as $user)
            <tr>
              <td>{{$user->name}}</td>
              <td>{{$user->email}}</td>
              <td>{{$user->created_at}}</td>
              <td><span class="badge {{$user->role==1?'bg-success':'bg-danger'}}">{{$user->role==1?'admin':'user'}}</span></td>
              <td><a class="btn btn-primary" href="{{ route('admin.users.edit', ['id' => $user->id]) }}">Edit</a></td>
              <td><a href="{{route('admin.users.delete',['id'=>$user->id])}}" class="btn btn-danger">Delete</a></td>
            </tr>
            @endforeach

          </tbody>
          <tfoot>
            <tr>
              <td colspan="5">


                {{ $users->links('vendor.pagination.bootstrap-4') }}

              </td>
            </tr>
          </tfoot>
        </table>

      </div>
    </div>

  </div>

</div>
@endsection