<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="{{asset('css/style_navbar_search.css')}}"/>
    <title>@yield('title')</title>
</head>
<body>
    <div class="menu">

        <div class="links">
            <div class="profile">
                <a href={{ route('profile') }} class="profile-btn"><i class="fa fa-user"></i></a>
             </div>
            <!-- <div class="about">
                    <a href={{route('about')}} class="about">about</i></a>
            </div>
            <div class="terms">
                <a href={{route('terms')}} class="term-service">Terms</i></a>
            </div>-->

        </div>

        <div class="logout">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"  class="logout-btn"><i class="fas fa-sign-out-alt"></i>Logout</button>
            </form>
        </div>
    </div>
    @yield('content')
</body>
</html>
