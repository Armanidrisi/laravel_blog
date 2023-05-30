@extends('layouts.admin')

@section('content')
<div class="container-fluid p-0">

  <h1 class="h3 mb-3">Edit Page</h1>

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title mb-0">Edit page</h5>
        </div>
        <div class="card-body">
          <form method="POST" action="{{ route('admin.pages.update',['id'=>$page->id]) }}">
            @csrf
            @method('PUT')
            <div class="form-group mb-3">
              <label class="form-label">Title</label>
              <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $page->title }}">
              @error('title')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="form-group mb-3">
              <label class="form-label">Slug(Leave blank for auto generate)</label>
              <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ $page->slug }}">
              @error('slug')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="mb-3">
              <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="myeditorinstance">{{$page->content}}</textarea>
              @error('content')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="form-group mb-3">
              <label class="form-label">Visibility</label>
              <select class="form-control @error('visibility') is-invalid @enderror" name="visibility">
                <option value="0"{{ $page->visibility===0 ? ' selected' : '' }}>Unlisted</option>
                <option value="1"{{ $page->visibility===1 ? ' selected' : '' }}>Footer</option>
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