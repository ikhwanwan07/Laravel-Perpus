
  <!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="{{ asset('assets/frontend/css/materialize.min.css') }}"  media="screen,projection"/>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <title>{{ $title ?? 'Perpusku' }}</title>
    </head>
    <body>
        
 <div class="navbar-fixed">
  <nav>
    <div class="nav-wrapper">
      <a href="{{ route('homepage') }}" class="brand-logo">Perpus</a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">Menu</i></a>
      
      <ul class="right hide-on-med-and-down">
        @guest
        <li><a href="{{ route('login') }}">Login</a></li>
        <li><a href="{{ route('register') }}">Register</a></li>  
        @else
        <li><a href="" class="dropdown-trigger" data-target="dropdown1">{{ auth()->user()->name }}</a></li>
    <ul id="dropdown1" class="dropdown-content">
      <li><a href="{{ route('home') }}">Home</a></li>
      <li><a href="{{ route('logout') }}"
        onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
         Logout</a></li>
    </ul>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
  </form>
    
        @endguest

       
        
      </ul>
    </div>
  </nav>
 </div>

  <ul class="sidenav" id="mobile-demo">
    @guest
    <li><a href="{{ route('login') }}">Login</a></li>
    <li><a href="{{ route('register') }}">Register</a></li>
   
    @else
    <ul id="dropdown1" class="dropdown-content">
      <li><a href="{{ route('logout') }}"
        onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
         Logout</a></li>
    </ul>
     @endguest
  </ul>

  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
  @yield('content')
</div>
        

      <!--JavaScript at end of body for optimized loading-->
            <script type="text/javascript" src="{{ asset('assets/frontend/js/materialize.min.js') }}"></script>
            @stack('script')
      <script>
        M.AutoInit();
         
      
    </script>
    </body>
  </html>