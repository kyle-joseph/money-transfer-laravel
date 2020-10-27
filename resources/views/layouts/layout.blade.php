<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- <link rel="stylesheet" type="text/css" href="css/style.css">
	    <link rel="stylesheet" type="text/css" href="css/demoStyle.css"> -->
        <link href="{{asset('css/demoStyle.css')}}" rel="stylesheet">
        <link href="{{asset('css/style.css')}}" rel="stylesheet">
        {{-- Chart JS --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>

	    <!-- Font Awesome -->
	    <script src="https://kit.fontawesome.com/3382ceab91.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="wrapper">
            <div class="sidebar">
                <h1>Money Transfer System</h1>
                <ul>
                    <a href="/"><li class="{{'/' == request()->path()?'active':''}}"><i class="fas fa-home"></i>Home</li></a>
                    <a href="/send"><li class="{{'send' == request()->path()?'active':''}}"><i class="fa fa-paper-plane"></i>Send</li></a>
                    <a href="/receive"><li class="{{'receive' == request()->path()?'active':''}}"><i class="fa fa-get-pocket"></i>Claim</li></a>
                    <a href="/transactions"><li class="{{'transactions' == request()->path() || 'transactions/unclaimed' == request()->path() || 'transactions/claimed' == request()->path() || 'transactions/unclaimed/edit' == request()->path() || 'transactions/report' == request()->path()?'active':''}}"><i class="fa fa-money"></i>Transactions</li></a>
                </ul>
            </div>
            <nav class="header">
                    <h1>@yield('header')</h1>
                    <ul>
                        <li><h2><i class="fas fa-user"></i></h2></li>
                        <li>{{Auth::user()->username}}</li>
                        <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i>
                        </a>
                        </li>
                    </ul>
            </nav>
            <div class="main_content">
                
                @yield('content')
            </div>
        </div>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        <script type="text/javascript" src="{{asset('js/script.js')}}""></script>
    </body>
</html>
