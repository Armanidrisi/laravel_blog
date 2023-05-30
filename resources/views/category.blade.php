@extends('layouts.app')

@section('content')
<div class="container">
  <h2 class="my-3">{{$category}} ({{$total}})</h2>

  <div class="row justify-content-center">
    @foreach ($posts as $post)
    <div class="col-sm-6 col-md-4">
      <div class="card">
        <img class="card-img-top" src="{{$post->image}}" alt="image">
        <div class="card-header">
          <h5 class="card-title mb-0">{{$post->title}}</h5>
        </div>
        <div class="card-body">

          <p class="card-text">
            {{ substr($post->content, 100) }}
          </p>
          <a href="/blog/{{$post->slug}}" class="card-link">Read More</a>
        </div>
      </div>
    </div>
    @endforeach
    <div class="d-flex justify-content-center">
      {{ $posts->links('vendor.pagination.bootstrap-4') }}
    </div>
  </div>

</div>
@endsection