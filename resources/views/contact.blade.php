@extends('layouts.app')

@section('content')

<div class="container d-flex flex-column">
  <div class="row">
    <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table">
      <div class="d-table-cell">
        <div class="text-center mt-4">

          <h1 class="h2">Contact</h1>

          <p class="lead">
            officia tempor veniam nulla Lorem ut culpa minim amet dolor
          </p>
        </div>

        <div class="card">
          <div class="card-body">
            <div class="m-sm-4">
                        @if(session('success'))
          <h5 class="mb-0 text-success">  {{ session('success') }}</h5>
          @endif
          @if(session('error'))
          <h5 class="mb-0 text-danger">  {{ session('error') }}</h5>
          @endif
              <form class="needs-validation" novalidate method="POST" action="{{route('contact.submit')}}">
                @csrf
                <div class="mb-3">
                  <label class="form-label">Name</label>
                  <input class="form-control form-control-lg @error('name') is-invalid @enderror" type="text" name="name" placeholder="Enter your name" required value="{{ old('name') }}" />
                @error('name')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="mb-3">
                <label class="form-label">Email</label>
                <input class="form-control form-control-lg @error('email') is-invalid @enderror" type="email" name="email" placeholder="Enter your email" required value="{{ old('email') }}" />
              @error('email')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="mb-3">
              <label class="form-label">Message</label>
              <textarea class="form-control form-control-lg @error('message') is-invalid @enderror" rows="6" name="message" placeholder="Enter your message" required>{{ old('message') }}</textarea>
              @error('message')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="text-center mt-3">
              <button type="submit" class="btn btn-lg btn-primary">Submit</button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
@endsection