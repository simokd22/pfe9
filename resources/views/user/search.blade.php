
@extends('layouts/navbar_search')
@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
<link rel="stylesheet" href="{{ asset('css/style_search.css') }}">
<script src="https://kit.fontawesome.com/3ac08d279f.js" crossorigin="anonymous"></script>
@endsection
@section('title' , 'search')
@section('content')

            <nav>


            </nav>
         <body>


<form method="post" action="{{route('user.search-post')}}" >
  @csrf
<!--logo-->
  <div class="logo_icon">
    <a href={{ route('user.search') }} class="logo_icon"><img src="{{ asset('logo/blue_logo.png') }}" alt="My Logo"></a>
  </div>
<!--logo-->

<!--searchbar-->
    <div  class="input-box">
      <input style="margin-left: 65px" type="text" placeholder="Search..." name="keyword" id="query" >
      <span class="icon">
        <i  class="uil uil-search search-icon"></i>
      </span>
      <i style="color: transparent" class="uil uil-times close-icon"></i>
    </div>
<!--searchbar-->





   <div class="selects" id="category-select">




<!--Languages-->
  <div class="wrapper">
    <div class="select-btn">
      <span>Langue</span>
      <i class="uil uil-angle-down"></i>
    </div>
    <div class="content">
      <!--That little search-box
      <div class="search">
        <i class="uil uil-search"></i>
        <input id="language-search" spellcheck="false" type="text" placeholder="Search">
      </div>
      That little search-box-->
      <div class="options">

        @foreach($languages as $language)
        <label>
            <input type="radio" name="language" value="{{ $language->langue }}" class="langues">
            {{ $language->langue }}
        </label>
        @endforeach


      </div>
    </div>
  </div>

<!--Languages-->



<!--Sites-->
 <div id="sites-select">


  <div class="wrapper2">
    <div class="select-btn2">
      <span>Sites</span>
      <i class="uil uil-angle-down"></i>
    </div>
    <div class="content2">
      <!--That little search-box
      <div class="search">
        <i class="uil uil-search"></i>
        <input id="site-search" spellcheck="false" type="text" placeholder="Search">
      </div>
      That little search-box-->
      <ul class="options2">
        <li>
          <input type="checkbox" id="all-sites" name="all-sites" value="all-sites">
          <label for="all-sites" id="all-sites-label">
            <b>Tous</b>
          </label>
        </li>
        @foreach ($sites as $site)
        <li>
          <input class="sites" type="checkbox" name="sites[]" value="{{$site->News_name}}">
          <label>{{ $site->News_name }}</label>
        </li>
        @endforeach
      </ul>

    </div>
  </div>

</div>
<!--Sites-->

<!--Categories-->
    <div class="wrapper1">
  <div class="select-btn1">
    <span> Catégorie </span>
    <i class="uil uil-angle-down"></i>
  </div>
  <div class="content1">
    <!--That little search-box
    <div class="search">
      <i class="uil uil-search"></i>
      <input id="category-search" spellcheck="false" type="text" placeholder="Search">
    </div>
    That little search-box-->
    <ul class="options1">
      <li>
        <input type="checkbox" id="all-categories" name="all-categories" value="all-categories">
        <label id="category_label" for="all-categories">
          <b>Tous</b>
        </label>
      </li>
      @foreach ($categories as $category)
      <li value="sport">
        <input type="checkbox" id="{{ $category->category_name }}" name="categoryCheckboxes[]" value="{{ $category->category_name }}">
        <label for="{{ $category->category_name }}">{{ $category->category_name }}</label>
      </li>
      @endforeach
    </ul>

  </div>
</div>
<!--Categories-->

  <!--date-->
    </div>

<!--radio-container-->
<div class="radio-container">
  <input type="radio" id="journal" name="radio-option" value="journal">
    <label for="journal">JOURNAL</label>

    <input type="radio" id="magazine" name="radio-option" value="magazine" >
    <label for="magazine">MAGAZINE</label>
  </div>
  <!--radio-container-->
      <div class="wrapper3">
       <label ><b>Du</b></label>  <input type="date" name="start-date">
       <label> <b>Au</b></label> <input type="date" name="end-date">
      </div>

    <!--date-->

    <!--save and reset botton-->
    <div class="buttons">
  <div class="button">
    <button id="save" class="search-btn" type="submit">Recherche</button>
    <button class="reset-btn" type="reset">Rénitialiser</button>
  </div>
</div>
<!--save and reset botton-->

<!--loading-->
<div class="loading-overlay" id="loadingOverlay">
  <div class="loading-dots">
    <span class="dot"></span>
    <span class="dot"></span>
    <span class="dot"></span>
  </div>
</div>
<!--loading-->



    </form>

            <footer>
              <p>copyright 2023-2024</p>
            </footer>

             </div>


          <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
          <script src="{{ asset('js/search.js') }}"></script>
          <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
          <script>
            $(document).ready(function() {
  $(".search-btn").click(function() {
    $("#loadingOverlay").fadeIn();
    setTimeout(function() {
      //$("#loadingOverlay").fadeOut();
    }, 2000);
  });
});

          </script>

        </body>
   @endsection
