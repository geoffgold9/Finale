<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
 
    <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

    </head>
    <body>
     <nav class="navbar navbar-expand-lg">
  <div class="container">
    <a class="navbar-brand" href="#">N{{config('app.name', 'Laravel')}}</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
   
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('admin.users.index') }}">Users</a>
        </li>
       
          
        
       
      </ul>
      <div class="form-inline my-2 my-lg-0">
      @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                        <a href="{{ route('logout') }}" onclick:="event.preventDefault();
                        document.getElementById('logout-form').submit();">Logout</a>
                    
                        <form id="logout-form" action="{{route('logout') }}" method="POST" style="display: none">
                            @crsf
            </form>
        @else
            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Login</a>
                    
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endif
                </div>
            @endif
</div>
    </div>
</div>
</nav>


<nav class="navbar sub-nav navbar-expand-lg">
  <div class="container">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('admin.users.index') }}">Users</a>
        </li>
</ul>
</div>
</div>
</nav>


<main class="container">
 
    @yield('content')
</main>

    </body>
</html>
