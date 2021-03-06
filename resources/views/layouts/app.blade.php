<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/custom.css?v=12') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/officer') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                            <form class="navbar-form navbar-left">
                                <div class="form-group">
                                    <input type="text" id="searchid" class="form-control" placeholder="អត្ថលេខ">
                                </div>
                            </form>
                            <li class="dropdown" id="toopen">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu" id="searchresult">
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    អវត្ថមាន <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ route('checking.index') }}">បន្ថែម</a></li>
                                    <li><a href="{{ route('checking.show.index') }}">បង្ហាញ</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    នគរបាល <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ route('officer.index') }}">បង្ហាញ</a></li>
                                    <li><a href="{{ route('officer.offices') }}">បន្ថែម</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ route('officer.data.index') }}">ទិន្នន័យជាក់ស្តែង</a></li>
                                    <li><a href="{{ route('officer.officer.show') }}">នគរបាល</a></li>
                                    <li><a href="{{ route('officer.insert.insert') }}">បន្ថែម នគរបាល</a></li>
                                    <li><a href="{{ route('part.create') }}">បន្ថែម  ផ្នែក</a></li>
                                    <li><a href="{{ route('office.create') }}">បន្ថែម ការិយាល័យ</a></li>
                                    <li><a href="{{ route('group.create') }}">បន្ថែម ផែន</a></li>
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            ចាកចេញ
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        @include('layouts.partials.alert')
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#searchid').keyup(function(){
                var value = $(this).val();
                var html = '';

                $.get('/api/search', {id:value}, function(data){
                    
                    $.each(data, function(i, item) {
                        html += ('<li><a href="/officer/officer/'+ item.id +'">'+ item.name +'</a></li>');
                    });

                    $('#searchresult').html(html);
                });

                $('#toopen').addClass('open');
            });

        });
    </script>
</body>
</html>
