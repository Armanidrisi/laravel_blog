@extends('layouts.admin')

@section('content')
<div class="container-fluid p-0">

  <h1 class="h3 mb-3">Create Page</h1>

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title mb-0">Create new page</h5>
        </div>
        <div class="card-body">
          <form method="POST" action="{{ route('admin.pages.store') }}">
            @csrf

            <div class="form-group mb-3">
              <label class="form-label">Title</label>
              <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}">
              @error('title')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="form-group mb-3">
              <label class="form-label">Slug(Leave blank for auto generate)</label>
              <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ old('slug') }}">
              @error('slug')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="mb-3">
              <textarea name="content" id="myeditorinstance">Hello, World!</textarea>

            </div>

            <div class="form-group mb-3">
              <label class="form-label">Visibility</label>
              <select class="form-control @error('visibility') is-invalid @enderror" name="visibility">
                <option value="0"{{ old('visibility')==='0' ? ' selected' : '' }}>Unlisted</option>
                <option value="1"{{ old('visibility')==='1' ? ' selected' : '' }}>Footer</option>
              </select>
              @error('visibility')
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