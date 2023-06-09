<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="{{asset('css/style_navbar_user.css')}}"/>
    <title>@yield('title')</title>
</head>
<body>
    <div class="menu">
        <!--logo icon-->
<div class="logo_icon">
    <a  class="logo_icon"><img src="{{ asset('logo/blue_symbol.png') }}" alt="My Logo">
    </a>
  </div>
  <!--logo icon-->
        <div class="links">
            <div class="logo_icon">
                <a href={{ route('user.search') }} class="logo_icon"><img src="{{ asset('logo/blue_symbol.png') }}" alt="My Logo"></a>
              </div>
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
