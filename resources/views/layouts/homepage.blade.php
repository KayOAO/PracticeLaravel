<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with JoeBLog landing page.">
    <meta name="author" content="Devcrud">
    <!-- font icons -->
    <link rel="stylesheet" href="{{ route('root') }}/assets/vendors/themify-icons/css/themify-icons.css">
    <!-- Bootstrap + JoeBLog main styles -->
    <link rel="stylesheet" href="{{ route('root') }}/assets/css/joeblog.css">

    <title>@yield('pageTitle')</title>
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">
    <!-- Page Second Navigation -->
    <nav class="navbar custom-navbar navbar-expand-md navbar-light bg-primary sticky-top">
        <div class="container">
            <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('root') }}">
                            <i class="ti-home"></i>
                            Home
                        </a>
                    </li>
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('articles.index', ['author' => Auth::user()->id]) }}">
                                    <i class="ti-book"></i>
                                    My Articles
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('articles.create') }}">
                                    <i class="ti-pencil-alt"></i>
                                    Write
                                </a>
                            </li>
                        @endauth
                    @endif
                </ul>
                <div class="navbar-nav ml-auto">
                    @if (Route::has('login'))
                        <div class="d-flex justify-content-end mr-2">
                            @auth
                                <div class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{ Auth::user()->name }}
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a href="{{ route('profile.show') }}" class="dropdown-item">
                                            Profile
                                        </a>

                                        <form id="logout" method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <a class="dropdown-item"
                                                onclick="document.getElementById('logout').submit();">Log out</a>
                                        </form>
                                    </div>
                                </div>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-primary rounded">Log in</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="btn btn-primary rounded">Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                    <div class="socials">
                        <a href="https://github.com/KayOAO"><i class="ti-github pr-1"></i></a>
                        <a href="https://medium.com/@kay2015sc"><i class="ti-flickr-alt pr-1"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- End Of Page Second Navigation -->

    <div class="container">
        @yield('main')
    </div>

    <!-- Page Footer -->
    <footer class="page-footer">
        <div class="container">
            <p class="border-top mb-0 mt-4 pt-3 small">&copy;
                <script>
                    document.write(new Date().getFullYear())
                </script>, JoeBlog Created By <a href="https://www.devcrud.com"
                    class="text-muted font-weight-bold" target="_blank">DevCrud.</a> All rights reserved
            </p>
        </div>
    </footer>
    <!-- End of Page Footer -->

    <!-- core  -->
    <script src="{{ route('root') }}/assets/vendors/jquery/jquery-3.4.1.js"></script>
    <script src="{{ route('root') }}/assets/vendors/bootstrap/bootstrap.bundle.js"></script>

    <!-- JoeBLog js -->
    <script src="{{ route('root') }}/assets/js/joeblog.js"></script>

</body>

</html>
