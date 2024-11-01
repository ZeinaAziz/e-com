
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/bootstrap-5-dist/css/bootstrap.css" rel="stylesheet">
    <title>E-Commerce</title>
</head>
<body style="position: relative">

    <nav class="navbar navbar-expand-lg bg-body-tertiary "style=" width: 100%;position: fixed;top:0;left:0;z-index:1;">
        <div class="container-fluid">
            <a class="navbar-brand" href="">E-Commerce</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('dashboard')}}"  >Products</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{route('categories.index')}}">categories</a>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-info " type="submit">Search</button>
            </form>
            </div>
        </div>
    </nav>

    <div class="container" style="position: fixed; right: -1050px;   bottom: 126px;    z-index: 1;">
            <button class="btn btn-success mt-3" data-toggle="modal" data-target="#commentModal"> Add New Category</button>
    </div>
    <div class="container" style="position: fixed; right: -1050px;   bottom: 35px;    z-index: 1;">
        <a href="">
                <button class="btn btn-danger mt-3">Delete All Category</button>
        </a>
    </div>
    <div class="container" style="position: fixed; right: -1050px;   bottom: 80px;    z-index: 1;">
        <a href="">
                <button class="btn btn-warning mt-3">Delete TrunCate</button>
        </a>
    </div>
    <div class="container" style="position: fixed; right: -1050px;   bottom: 170px; z-index: 1;">
        <a href="">
                <button class="btn btn-info mt-3"> Show All Category Soft Delete</button>
        </a>
    </div>
    <div class="container" style="position: fixed; right: -1050px;   top: 80px; z-index: 1;">
               <div class="card" style="width: 15rem;">
                    <div class="card-body">
                        <h4>{{Auth::user()->name}}</h4>
                        <p>{{Auth::user()->email}}</p>
                        <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                 <h6>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">

                                            <button class="btn btn-danger">{{ __('Logout') }}</button>
                                    </a>
                                 </h6>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                                </div>
                            </li>
                        @endguest
                        </ul>
                    </div>
                </div>
    </div>

   <div style="height:80px "></div>
    <div class="modal fade" id="commentModal" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="commentModalLabel">Add Category</h5>
                    <div style="width:300px "></div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                <div class="form-group">
                <label for="content">Category</label>
                <input name="name" id="content" class="form-control" required>
                </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add Category</button>
                </div>
            </form>
            </div>
        </div>
    </div>






    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>
</html>

