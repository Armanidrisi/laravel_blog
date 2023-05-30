@extends('layouts.admin')

@section('content')
<div class="container-fluid p-0">

  <h1 class="h3 mb-3">Create Post</h1>

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title mb-0">Create new Post</h5>
        </div>
        <div class="card-body">
          <form method="POST" action="{{ route('admin.posts.store') }}" enctype="multipart/form-data">
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
              <label class="form-label">Image</label>
              <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
              @error('image')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="mb-3">
              <textarea name="content" id="myeditorinstance">Hello, World!</textarea>

            </div>

            <div class="form-group mb-3">
              <label class="form-label">category</label>
              <select class="form-control @error('category') is-invalid @enderror" name="category">
                @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
              </select>
              @error('category')
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