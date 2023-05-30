@extends('layouts.admin')

@section('content')
<div class="container-fluid p-0">

  <h1 class="h3 mb-3">Edit User</h1>

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title mb-0">Edit user</h5>
        </div>
        <div class="card-body">
          <form method="POST" action="{{ route('admin.users.update',['id'=>$user->id]) }}">
            @csrf
            @method('PUT')
            <div class="form-group mb-3">
              <label class="form-label">Name</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}">
              @error('name')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="form-group mb-3">
              <label class="form-label">Email</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}">
              @error('email')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="form-group mb-3">
              <label class="form-label">Password (leave empty if you don't want to change it)</label>
              <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
              @error('password')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

<div class="form-group mb-3">
  <label class="form-label">Role</label>
  <select class="form-control @error('role') is-invalid @enderror" name="role">
    <option value="0"{{ (old('role') === '0' || $user->role === 0) ? ' selected' : '' }}>User</option>
    <option value="1"{{ (old('role') === '1' || $user->role === 1) ? ' selected' : '' }}>Admin</option>
  </select>
  @error('role')
  <div class="invalid-feedback">
    {{ $message }}
  </div>
  @enderror
</div>


            <div class="form-group mb-3">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>

</div>
@endsection