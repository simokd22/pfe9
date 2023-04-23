
@extends('layouts/navbar_user')
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
              
<!-- Menu -->

      <!--log out-->
{{--<div class="logout">
  <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button type="submit"  class="logout-btn"><i class="fas fa-sign-out-alt"></i>Logout</button>
  </form>
  <!--log out-->


 <!--terms-->
<div class="terms">
  <a href={{url('/terms')}} class="term-service">Terms</i></a>
</div>
<!--terms-->

<!--about-->
<div class="about">
  <a href={{url('/about')}} class="about">about</i></a>
  </div>
  <!--about-->

  <!--profile-->
  <div class="profile">
    <a href={{ route('profile') }} class="profile-btn"><i class="fa fa-user"></i></a>
</div>
<!--profile-->

<!--logo icon-->
<div class="logo_icon">
  <a href={{ route('user.search') }} class="logo_icon"><img src="{{ asset('logo/blue_symbol.png') }}" alt="My Logo">
  </a>
</div>
<!--logo icon-->

<!-- Menu -->--}}

   

<form method="post" action="{{route('user.search-post')}}" >
  @csrf
    <div class="input-box">
      <input type="text" placeholder="Search..." name="keyword" id="query" >
      <span class="icon">
        <i class="uil uil-search search-icon"></i>
      </span>
      <i class="uil uil-times close-icon"></i>
    </div>

   <!--Categories-->          
    <div class="selects">
      
        
        <div class="wrapper1">
          <div class="select-btn1">
            <span>Select Category</span>
            <i class="uil uil-angle-down"></i>
          </div>
          <div class="content1">
            <!--That little search-box-->
            <div class="search">
              <i class="uil uil-search"></i>
              <input id="category-search" spellcheck="false" type="text" placeholder="Search">
            </div>
            <!--That little search-box-->
            <ul class="options1">
              <li><input type="checkbox" id="all-categories" name="all-categories" value="all-categories"> <label id="category_label" for="all-categories"> <b>All Categories</b></label></li>
              <li value="sport"><input type="checkbox" id="sport" name="categories[]" value="رياضة"><label for="sport">رياضة</label></li>
              <li value="politique"><input type="checkbox" id="politique" name="categories[]" value="سياسة"><label for="politique">سياسة</label></li>
              <li value="societe"><input type="checkbox" id="societe" name="categories[]" value="مجتمع"><label for="societe">مجتمع</label></li>
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
      <!--That little search-box-->
      <div class="search">
        <i class="uil uil-search"></i>
        <input id="language-search" spellcheck="false" type="text" placeholder="Search">
      </div>
      <!--That little search-box-->
      <div class="options">
        <label> <input type="radio" name="language" value="english">English</label>
        <label>
          <input type="radio" name="language" value="french">
          French
        </label>
        <label>
          <input type="radio" name="language" value="arabic">
          Arabic
        </label>
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
      <!--That little search-box-->
      <div class="search">
        <i class="uil uil-search"></i>
        <input id="site-search" spellcheck="false" type="text" placeholder="Search">
      </div>
      <!--That little search-box-->
      <ul class="options2">
        <li><input type="checkbox" id="all-sites" name="all-sites" value="all-sites"> <label for="all-sites" id="all-sites"><b>All Sites</b></label></li>
        <li value="hespress"><input type="checkbox" id="hespress" name="sites[]" value="hespress"><label for="hespress">Hespress</label></li>
        <li value="al3omeq"><input type="checkbox" id="al3omeq" name="sites[]" value="al3omeq"><label for="al3omeq">Al3omeq</label></li>
        <li value="24h"><input type="checkbox" id="24h" name="sites[]" value="24h"><label for="24h">24h</label></li>
        <li value="today"><input type="checkbox" id="today" name="sites[]" value="today"><label for="today">Today</label></li>
      </ul>
    </div>
  </div>

</div>
<!--Sites--> 


  <!--date--> 
    </div>

      
      <div class="wrapper3">
       <label >Du:</label>  <input type="date" name="start-date">
       <label>Au:</label> <input type="date" name="end-date">
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
        
          
          <script src="{{ asset('js/search.js') }}"></script>
        </body>
   @endsection