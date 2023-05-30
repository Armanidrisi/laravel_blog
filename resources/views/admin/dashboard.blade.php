@extends('layouts.admin')
@section('content')
<div class="container-fluid p-0">

  <h1 class="h3 mb-3">Dashboard</h1>

  <div class="row">
    <div class="col-xl-6 col-xxl-5 d-flex">
      <div class="w-100">
        <div class="row">
          <div class="col-sm-6">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col mt-0">
                    <h5 class="card-title">Posts</h5>
                  </div>

                  <div class="col-auto">
                    <div class="stat text-primary">
                      <i class="align-middle" data-feather="edit"></i>
                    </div>
                  </div>
                </div>
                <h1 class="mt-1 mb-3">{{$posts}}</h1>

              </div>
            </div>
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col mt-0">
                    <h5 class="card-title">Users</h5>
                  </div>

                  <div class="col-auto">
                    <div class="stat text-primary">
                      <i class="align-middle" data-feather="users"></i>
                    </div>
                  </div>
                </div>
                <h1 class="mt-1 mb-3">{{$users}}</h1>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col mt-0">
                    <h5 class="card-title">Comments</h5>
                  </div>

                  <div class="col-auto">
                    <div class="stat text-primary">
                      <i class="align-middle" data-feather="message-square"></i>
                    </div>
                  </div>
                </div>
                <h1 class="mt-1 mb-3">{{$comments}}</h1>
              </div>
            </div>
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col mt-0">
                    <h5 class="card-title">Categories</h5>
                  </div>

                  <div class="col-auto">
                    <div class="stat text-primary">
                      <i class="align-middle" data-feather="box"></i>
                    </div>
                  </div>
                </div>
                <h1 class="mt-1 mb-3">{{$category}}</h1>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col mt-0">
                    <h5 class="card-title">Pages</h5>
                  </div>

                  <div class="col-auto">
                    <div class="stat text-primary">
                      <i class="align-middle" data-feather="book"></i>
                    </div>
                  </div>
                </div>
                <h1 class="mt-1 mb-3">{{$pages}}</h1>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>



  </div>


  <div class="row">
    <div class="col-12 col-lg-8 col-xxl-9 d-flex">
      <div class="card flex-fill table-responsive">
        <div class="card-header">

          <h5 class="card-title mb-0">Latest Users</h5>
        </div>
        <table class="table table-hover my-0">
          <thead>
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Date</th>
              <th>Role</th>
            </tr>
          </thead>
          <tbody>
            @foreach($lusers as $user)
            <tr>
              <td>{{$user->name}}</td>
              <td>{{$user->email}}</td>
              <td>{{$user->created_at}}</td>              <td><span class="badge {{$user->role==1?'bg-success':'bg-danger'}}">{{$user->role==1?'admin':'user'}}</span></td>
            </tr>
            @endforeach

          </tbody>
          <tfoot>
            <tr>
              <td colspan="5">
                <a class="btn btn-primary" href="{{ route('admin.users') }}">All Users</a>
              </td>
            </tr>
          </tfoot>
        </table>

      </div>
    </div>

  </div>

</div>
@endsection