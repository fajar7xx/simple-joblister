<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Simple Web Job Lister">
    <meta name="author" content="Fajar Siagian">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicons -->
    <link rel="icon" href="{{ asset('images/favicon.ico') }}">

    <title>Administrator | @yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('plugins/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    @yield('css')

</head>
<body>
    <nav class="navbar navbar-dark bg-primary navbar-expand-lg">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li>
          </ul>
          
          <div class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="button" value="logout">
          </div>
        </div>
      </nav>
    <div class="container-fluid">        
        <div class="row">
            <div class="col-3">
                sidebar
            </div>
    
            <div class="col-9">
                konten
            </div>
        </div>
    </div>

    <script src="{{ asset('plugins/jquery/dist/jquery.min.js') }}">
    </script>
    <script src="{{asset('plugins/bootstrap/dist/js/bootstrap.bundle.min.js')}}">
    </script>
    @stack('scripts')
</body>

</html>
