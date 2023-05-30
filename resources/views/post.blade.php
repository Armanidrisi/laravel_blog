@extends('layouts.app')

@section('content')
<main class="content">
  <div class="container-fluid p-0">

    <div class="row">
      <div class="col-12">
        <div class="card">
          <img class="card-img-top" src="{{$post->image}}" alt="image">        <div class="card-header d-flex justify-content-between">
            <h5 class="card-title mb-0">{{$post->created_at}}</h5>
            <p class="badge bg-success">
              {{$post->category->name}}
            </p>
          </div>
          <div class="card-header">
            <h5 class="card-title mb-0">{{$post->title}}</h5>
          </div>
          <div class="card-body">
            {!! $post->content !!}
          </div>
        </div>
      </div>
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h5 class="card-title mb-0">Leave A Comment</h5>
          </div>
          <div class="card-body">
            @if(session('success'))
            <h5 class="text-success my-2">
              {{ session('success') }}
            </h5>
            @endif
            <form method="POST" action="/comment/add" class="needs-validation" novalidate>
              @csrf
              <input type="hidden" name="post_id" value="{{ $post->id }}">
              <textarea rows="6" class="form-control mb-3 @error('content') is-invalid @enderror" name="content" required></textarea>
              @error('content')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror

              <button type="submit" class="btn btn-primary">Submit</button>
            </form>

          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header">
          <h5 class="card-title mb-0">Recent Comments</h5>

        </div>
        <div class="card-body col-sm-6 col-md-4">
          @foreach ($post->comments as $comment)
          <div class="card">

            <div class="card-body">
              <h5 class="mt-0">{{$comment->author}}</h5>
              <p class="card-text">
                {{$comment->content}}
              </p>
            </div>

          </div>
          @endforeach
        </div>
      </div>

    </div>

  </div>
</main>
@endsection