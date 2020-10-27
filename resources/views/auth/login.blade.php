<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Login</title>

        <link href="{{asset('css/demoStyle.css')}}" rel="stylesheet">
        <link href="{{asset('css/login.css')}}" rel="stylesheet">

	    <!-- Font Awesome -->
        <script src="https://kit.fontawesome.com/3382ceab91.js" crossorigin="anonymous"></script>
        
    </head>
    <body>
        <div class="wrap">
            <div class="container">
                <div class="banner">
                    <div class="banner-title"><h1>Money Transfer System</h1></div>
                    <div class="overlay"></div>
                </div>
                <div class="login-form">
                    <div class="content">
                        <div class="login">
                            <h1>LOGIN</h1>
                        </div>
                        <form action="{{ route('login') }}" onsubmit="return loginValidation()" method="POST">
                            @csrf   
                            <div class="log">
                                <div class="form center">
                                    <input id="username"type="text" name="username" autofocus autocomplete="off" placeholder=" ">
                                    <label for="name" class="label-name">
                                        <span class="content-name">Username</span>
                                    </label>
                                </div><br>
                                <div class="form center">
                                    <input id="password"type="password" name="password" autofocus autocomplete="off" placeholder=" ">
                                    <label for="name" class="label-name">
                                        <span class="content-name">Password</span>
                                    </label>
                                </div><br>
                                <input  type="submit" value="LOGIN"><br>
                                {{-- <a href="/register"><input  type="button" value="SIGNUP"></a> --}}
                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <h4>{{$error}}</h4>
                                    @endforeach
                                @endif
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="{{asset('js/login.js')}}""></script>
    </body>
</html>
