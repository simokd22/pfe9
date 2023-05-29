
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


<!--radio-container-->
<div class="radio-container">
  <input type="radio" id="magasin" name="radio-option" checked>
  <label for="magasin">MAGASIN</label>

  <input type="radio" id="journal" name="radio-option">
  <label for="journal">JOURNAL</label>
</div>
<!--radio-container-->

     <!--Categories-->
   <div class="selects" id="category-select">


    <div class="wrapper1">
      <div class="select-btn1">
        <span>Select Category</span>
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
              <b>All Categories</b>
            </label>
          </li>
          @foreach ($categories as $category)
          <li value="sport">
            <input type="checkbox" id="{{ $category->category_name }}" name="categories[]" value="{{ $category->category_name }}">
            <label for="{{ $category->category_name }}">{{ $category->category_name }}</label>
          </li>
          @endforeach
        </ul>

      </div>
    </div>

<!--Categories-->


<!--Languages-->
  <div class="wrapper">
    <div class="select-btn">
      <span>Select Language</span>
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
      <span>Select Sites</span>
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
            <b>All Sites</b>
          </label>
        </li>
        @foreach ($sites as $site)
        <li>
          <input class="sites" type="checkbox" name="sites[]" value="{{ $site->News_name }}">
          <label>{{ $site->News_name }}</label>
        </li>
        @endforeach
      </ul>

    </div>
  </div>

</div>
<!--Sites-->


  <!--date-->
    </div>


      <div class="wrapper3">
       <label ><b>From</b></label>  <input type="date" name="start-date">
       <label> <b>To</b></label> <input type="date" name="end-date">
      </div>

    <!--date-->

    <!--save and reset botton-->


      <div class="buttons">
        <div class="button">
           <button class="search-btn" type="submit">Search</button>
        <button class="reset-btn" type="reset">Reset</button>
        </div>

      </div>
    <!--save and reset botton-->
    </form>

            <footer>
              <p>copyright 2023-2024</p>
            </footer>

             </div>


          <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
          <script src="{{ asset('js/search.js') }}"></script>

        </body>
   @endsection
