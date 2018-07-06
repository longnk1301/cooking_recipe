<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>Admin</title>
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
                    </div>

                    <div class="collapse navbar-collapse" id="app-navbar-collapse">
                        <ul class="nav navbar-nav">
                            &nbsp;
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
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
                   </div>
               </div>
           </nav>
           {{-- END NAV --}}

            <div id="app">
                <admin></admin>
            </div>

            <footer style="min-height: 300px; min-width: 100%;background-color: #000; color: #fff">
                footer
            </footer>

        </div>
        {{-- END IN BOX --}}
    </div>
    {{-- END TEMPLETE --}}
    {!! Html::script('/js/app.js') !!}
</body>
</html>
