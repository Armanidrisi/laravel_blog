@extends('layouts.app')

@section('content')
<div class="container">

  <h1 class="h3 mb-3">{{$page->title}}</h1>

  <div class="row justify-content-center">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title mb-0">Last updated: {{$page->updated_at}}</h5>
        </div>
        <div class="card-body">
          {!! $page->content !!}
        </div>
      </div>
    </div>
  </div>

</div>
@endsection