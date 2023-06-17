<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <link rel="stylesheet" href="{{asset('css/style_navbar.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/style_navbar_user.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/style_navbar_search.css')}}"/>
    <title>@yield('title')</title>
</head>
<body>
    <div class="menu" style="background-color: whitesmoke;">
        <!--logo icon-->
<div class="logo_icon">
    <a  class="logo_icon"><img src="{{ asset('logo/blue_symbol.png') }}" alt="My Logo">
    </a>
  </div>
  <!--logo icon-->
        <div class="links">
            <div class="logo_icon">
                <a href={{Auth::user()->role_id=='1'? route('admin.search'): route('user.search') }} class="logo_icon"><img src="{{ asset('logo/blue_symbol.png') }}" alt="My Logo"></a>
              </div>
              @if (Auth::user()->role_id=='1')
              <div class="link">
                <a  href="{{route('admin.search')}}" >Recherche</a>
            </div>
            <div class="link">
                <a  href="{{route('Userinfo.index')}}" >Utilisateurs</a>
            </div>
            <div class="link">
                <a  href="{{route('news.index')}}">Jornaux et Magazines</a>
            </div>
            <div class="link">
                <a  href="{{route('Categories.index')}}" >Categorie</a>
            </div>
            <div class="link">
                <a  href="{{route('langues.index')}}" >langues</a>
            </div>
            @endif
            <div class="profile">
                <a href={{Auth::user()->role_id=='1'? route('profile_admin')  : route('profile_user') }} class="profile-btn"><i class="fa fa-user"></i></a>
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
