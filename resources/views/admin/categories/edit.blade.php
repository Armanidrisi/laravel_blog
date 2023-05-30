@extends('layouts.admin')

@section('content')
<div class="container-fluid p-0">

  <h1 class="h3 mb-3">Edir Category</h1>

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title mb-0">Edit category</h5>
        </div>
        <div class="card-body">
          <form method="POST" action="{{ route('admin.categories.update',['id'=>$category->id]) }}">
            @csrf
            @method('PUT')
            <div class="form-group mb-3">
              <label class="form-label">Name</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $category->name }}" placeholder="Category name">
              @error('name')
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