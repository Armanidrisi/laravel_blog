@php
$currentRoute = Request::route()->getName();
@endphp
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="{{ asset('js/tinymce/js/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('js/tinymce-config.js') }}"></script>
</head>
<body>
  <div class="wrapper">
    <nav id="sidebar" class="sidebar js-sidebar">
      <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.html">
          <span class="align-middle">{{config('app.name', 'Laravel')}}</span>
        </a>

        <ul class="sidebar-nav">

          <li class="sidebar-item {{$currentRoute=='admin.dashboard'?'active':''}}">
            <a class="sidebar-link" href="{{ route('admin.dashboard') }}">
              <i class="align-middle" data-feather="sliders"></i>
              <span class="align-middle">Dashboard</span>
            </a>
          </li>
          <li class="sidebar-header">Posts</li>
          <li class="sidebar-item {{$currentRoute=='admin.posts'?'active':''}}">
            <a class="sidebar-link" href="{{route('admin.posts')}}">
              <i class="align-middle" data-feather="edit"></i> <span class="align-middle">Posts</span>
            </a>
          </li>

          <li class="sidebar-item {{$currentRoute=='admin.comments'?'active':''}}">
            <a class="sidebar-link" href="{{route('admin.comments')}}">
              <i class="align-middle" data-feather="message-square"></i> <span class="align-middle">Comments</span>
            </a>
          </li>

          <li class="sidebar-item {{$currentRoute=='admin.categories'?'active':''}}">
            <a class="sidebar-link" href="{{route('admin.categories')}}">
              <i class="align-middle" data-feather="box"></i> <span class="align-middle">Categories</span>
            </a>
          </li>


          <li class="sidebar-header">
            Pages
          </li>

          <li class="sidebar-item {{$currentRoute=='admin.pages'?'active':''}}">
            <a class="sidebar-link" href="{{route('admin.pages')}}">
              <i class="align-middle" data-feather="book"></i> <span class="align-middle">Pages</span>
            </a>
          </li>

          <li class="sidebar-header">
            Users
          </li>

          <li class="sidebar-item {{$currentRoute=='admin.users'?'active':''}}">
            <a class="sidebar-link" href="{{route('admin.users')}}">
              <i class="align-middle" data-feather="users"></i> <span class="align-middle">Users</span>
            </a>
          </li>

        </ul>

      </div>
    </nav>

    <div class="main">
      <nav class="navbar navbar-expand navbar-light navbar-bg">
        <a class="sidebar-toggle js-sidebar-toggle">
          <i class="hamburger align-self-center"></i>
        </a>

        <div class="navbar-collapse collapse">
          <ul class="navbar-nav navbar-align">
            <li class="nav-item dropdown">
              <a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
                <div class="position-relative">
                  <i class="align-middle" data-feather="bell"></i>
                  <span class="indicator">4</span>
                </div>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-icon dropdown-toggle" href="#" id="messagesDropdown" data-bs-toggle="dropdown">
                <div class="position-relative">
                  <i class="align-middle" data-feather="message-square"></i>
                </div>
              </a>

            </li>
            <li class="nav-item dropdown">
              <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                <i class="align-middle" data-feather="settings"></i>
              </a>

              <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                <span class="text-dark">{{ auth()->user()->name }}</span>

              </a>
              <div class="dropdown-menu dropdown-menu-end">
                <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">Log out</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>
      <main class="content">
        @yield('content')
      </main>

    </div>
  </div>
</body>

</html>