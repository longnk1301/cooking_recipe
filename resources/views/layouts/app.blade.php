<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>Cooking Recipe</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    {!! Html::style('/css/app.css') !!}
    {!! Html::style('bower/font-awesome/css/font-awesome.min.css') !!}
    {!! Html::script('/bower/jquery/dist/jquery.min.js') !!}

</head>
<body>
    {{-- TEMPLETE --}}
    <div>
        {{-- IN BOX --}}
        <div class="user-management">
            {{-- NAV --}}
            <nav class="navbar navbar-default navbar-static-top">
                <div class="container">
                    <div class="navbar-header">
                        <!-- Collapsed Hamburger -->
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                           <span class="sr-only">Toggle Navigation</span>
                           <span class="icon-bar"></span>
                           <span class="icon-bar"></span>
                           <span class="icon-bar"></span>
                        </button>

                       <!-- Branding Image -->
                        <a class="navbar-brand" href="/">
                           <i class="fa fa-cutlery" aria-hidden="true" style="text-align: center; vertical-align: middle; color: orange"></i> CRecipe.vn
                        </a>
                    </div>

                    <div class="collapse navbar-collapse" id="app-navbar-collapse">
                        <!-- Left Side Of Navbar -->
                        <ul class="nav navbar-nav">
                            &nbsp;
                        </ul>

                        <!-- Right Side Of Navbar -->
                        @if (Auth::check())
                            <ul class="nav navbar-nav navbar-right">
                                <div class="login">
                                    <a href="#"><i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-google-plus-square fa-2x text-danger" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-instagram fa-2x color-black" aria-hidden="true"></i></a>
                                </div>
                               <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                       {{ Auth::user()->name }}<span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                       <li>
                                           <a href="{{ route('profiles') }}">Thông tin cá nhân</a>
                                       </li>
                                       <li>
                                           <a href="{{ route('logout') }}">Đăng xuất</a>
                                       </li>
                                    </ul>
                               </li>
                           </ul>
                        @else
                            <div class="login">
                                <a href="{{ route('register') }}">Đăng ký</a>
                                <a href="{{ route('login') }}">Đăng nhập <i class="fa fa-sign-in" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-google-plus-square fa-2x text-danger" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-instagram fa-2x color-black" aria-hidden="true"></i></a>
                            </div>
                       @endif
                   </div>
               </div>
           </nav>
           {{-- END NAV --}}

            {{-- MENU --}}
           <div class="menu">
                <ul>
                    <li><a href="{{ route('welcome') }}"><i class="fa fa-home" aria-hidden="true"></i> Trang chủ</a></li>
                    <li><a href="{{ route('recipe') }}"><i class="fa fa-hand-paper-o" aria-hidden="true"></i> Công thức</a></li>
                    <li><a href="#"><i class="fa fa-user" aria-hidden="true"></i> Top thành viên</a></li>
                    <li><a href="#"><i class="fa fa-book" aria-hidden="true"></i> Bộ sưu tập</a></li>
                </ul>
            </div>
            {{-- END MENU --}}

            @yield('content')

        </div>
        {{-- END IN BOX --}}
    </div>
    {{-- END TEMPLETE --}}
    {!! Html::script('/js/app.js') !!}
</body>
</html>
