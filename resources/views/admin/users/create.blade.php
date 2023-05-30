@extends('layouts.admin')

@section('content')
<div class="container-fluid p-0">

  <h1 class="h3 mb-3">Create User</h1>

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title mb-0">Create new user</h5>
        </div>
        <div class="card-body">
          <form method="POST" action="{{ route('admin.users.store') }}">
            @csrf

            <div class="form-group mb-3">
              <label class="form-label">Name</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
              @error('name')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="form-group mb-3">
              <label class="form-label">Email</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
              @error('email')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="form-group mb-3">
              <label class="form-label">Password</label>
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
                <option value="0"{{ old('role') === '0' ? ' selected' : '' }}>User</option>
                <option value="1"{{ old('role') === '1' ? ' selected' : '' }}>Admin</option>
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