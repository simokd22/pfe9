
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title> Animated Search Bar </title>
        <!-- CSS -->
        <!-- Unicons CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

 <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
 <link rel="stylesheet" href="{{ asset('css/style_search.css') }}">

<!--style>



                     </style-->
          </head>
          <body>
            
    
        <div class="container">
          <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"  class="logout-btn"><i class="fas fa-sign-out-alt"></i>Logout</button>
            </form>
        <form  action="{{route('user.search')}}" method="post" >
            @csrf
            <div class="input-box">
              <input type="text" placeholder="Search..." name="keyword" id="query" >
              <span class="icon">
                <i class="uil uil-search search-icon"></i>
              </span>
              <i class="uil uil-times close-icon"></i>
            </div>
           

              <div class="selects">
                <form class="divs">
                  <div class="wrapper1">
                    <div class="select-btn1">
                      <span>Select Category</span>
                      <i class="uil uil-angle-down"></i>
                    </div>
                      <div class="content1">
                        <div class="search">
                          <i class="uil uil-search"></i>
                          <input spellcheck="false" type="text" placeholder="Search" name="category" id="category" >
                        </div>
                      <ul class="options1">
                    </div>
                  </div> 
                </form>
                <form class="divs">
                  <div class="wrapper">
                    <div class="select-btn">
                      <span>Select Language</span>
                      <i class="uil uil-angle-down"></i>
                    </div>
                    <div class="content">
                      <div class="search">
                        <i class="uil uil-search"></i>
                        <input spellcheck="false" type="text" placeholder="Search" name="language" id="language" >
                      </div>
                      <ul class="options">
                    </div>
                  </div> 
                </form>
                <form class="divs" disabled="true" >
                  <div class="wrapper2">
                    <div class="select-btn2">
                      <span>Select Sites</span>
                      <i class="uil uil-angle-down"></i>
                    </div>
                    <div class="content2">
                      <div class="search">
                        <i class="uil uil-search"></i>
                        <input spellcheck="false" type="text" placeholder="Search" name="name_site" id="name_site" >
                      </div>
                      <ul class="options2">
                    </div>
                  </div>
                </form>
              </div>
              <form class="divs2">
                <div class="wrapper3">
                 <label >Du:</label>  <input type="date" name="start_date" id="start_date" value="start_date">
                 <label>Au:</label> <input type="date" name="end_date" id="end_date" value="end_date">
                </div>
              </form>

              <form class="divs3">
                <div class="buttons">
                  <button class="search-btn" type="submit">Search</button>
                  <button class="reset-btn" type="reset">Reset</button>
                </div>
              </form>
            </form>
            @if (!empty($keyword))
            <p>Keyword: {{ $keyword }}</p>
        @endif
        @if (!empty($category))
            <p>Category: {{ $category }}</p>
        @endif
        @if (!empty($language))
            <p>Language: {{ $language }}</p>
        @endif
        @if (!empty($name_site))
            <p>Name of Site: {{ $name_site }}</p>
        @endif
        @if (!empty($start_date) && !empty($end_date))
            <p>Date Range: {{ $start_date }} - {{ $end_date }}</p>
        @endif
            <footer>
              <p>copyright 2023-2024</p>
            </footer>
            
          </div>
        
          <!--script>
            
          
          </script-->
          <script src="{{ asset('js/search.js') }}"></script>

    </body>
</html>