@php
session_start();
if(!isset($_SESSION['IsInArticle'])) {
  $_SESSION['IsInArticle']=0;
}

@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style>


body{
    background-color: #ebebeb;
    margin: 1% 8%;
}

.blog {
  width: calc(25% - 20px);
  position: relative;
  margin: 0 1px 40px 1px;

}
.blog::before {
  content: "";
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background-color: black;
  opacity: 0.3;
}
.blog img {

  width: 100%;
  height: 200px;
  object-fit: cover;
}

.blog-info {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  box-shadow: 0px 10px 20px -10px rgba(0, 0, 0, 0.1);
  padding: 10px 10px 10px 10px ;
  color: white;
  font-family: 'Poppins', sans-serif;
  font-size: 14px;
  opacity: 1;
  transition: all 0.1s ease-in-out;

}

.blog-date {
  margin-bottom: 5px;
  opacity: 1;
  transition: all 0.1s ease-in-out;
  margin-top: 20px;
}

.blog-title {
  font-weight: bold;
  font-size: 20px;
  transition: all 0.1s ease-in-out;
}

.blog:hover .blog-date {
  opacity: 0;
}


.blog:hover .blog-title {
  font-size: 22px;
}
a{
    color: #ffffff;
    text-decoration: none;
    text-decoration-line: none;
    text-decoration-thickness: initial;
    text-decoration-style: initial;
    text-decoration-color: initial;
    background-color: transparent;
}
a{
cursor: pointer;
    color: var(--textColor);
}

.tabs {

  display: flex;
  flex-direction: row;
  margin: 5px 10px;
}

.tab {
  text-align: center;
  border-radius: 8px;
  align-items: center;
  padding-top: 5px;
  height:32px;
  width:80px;
}
.tab:hover{
  background-color:lightgray;
  cursor: pointer;
}

.tab-content {
  padding: 20px;
}

.tab-pane {
  display: none;
}

.tab-pane.active {
  display: block;
}
.articles-container{
    display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  justify-items: right;
  font-family: Arial, Helvetica, sans-serif;
  margin-top:15px;
}
.pages{
  display: grid;
  place-items: center;
  margin-top: 15px;
}
.page{
  font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif ;
    font-size: 20px;
}
.page-num{
    border:none;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif ;
    font-size: 15px;
    font-weight: 500;
    background-color: #ebebeb;
    border-radius: 7px;
    padding: 0 8px

}
.page-num:hover{
  cursor: pointer;
  background-color: #cfc8c8;
}
</style>
</head>
<body>
    @if (empty($data))
    <h2 class="Error">No Results Found!!</h2>
    @else
    @php
        $index=1 ;
    @endphp
    <div class="tab-container">
        <div class="tabs">
            @foreach ( $data as $key => $innerdata )
            <div class="tab" id="{{ $index }}" > {{ $key }}</div>
            @php
            $index++ ;
            @endphp
            @endforeach
        </div>
        <div class="tab-content">
                @php
                $index=1;
                @endphp
                @foreach ($data as $key => $innerdata)
                <div class="tab-pane" id="{{ $index }}-content">
                @if (count($innerdata)==1)
                <div class="articles-container">
                    <div class="blog"><p>NO DATA FOUND</p></div>
                </div>
                @else
                <div class="articles-container">
                    @for ($i=0;$i<count($innerdata)-1;$i++)
                    <div class="blog">
                        <img src="{{ $innerdata[$i]['image'] }}" alt="Blog Image {{ $i }}" loading="lazy" decoding="async">
                        <div class="blog-info">
                          <p class="blog-date">{{ $innerdata[$i]['date'] }}</p>
                          <a href="{{ route('user.article',['news'=>$key,'id'=>$i]) }}" class="blog-title">{{ $innerdata[$i]['title'] }}</a>
                        </div>
                    </div>
                    @endfor
                    </div>
                    <div class="pages" id="pages">
                        <table>
                          <tr>
                            <p class="page">Pages</p>
                          </tr>
                            <tr>
                                @for ($i=1;$i<=$innerdata['PagesNumber'];$i++)
                                <td><button class="page-num"> {{ $i }} </button> </td>
                                @endfor
                            </tr>
                        </table>
                    </div>
                @endif
                </div>
                @php
                $index++ ;
                @endphp
                @endforeach
        </div>
    @endif
    <script>
      $(document).ready(function() {
        //var now={{ json_encode(session()->get('now')) }};
        //console.log(now);
        var activeTab={{ json_encode($activTab) }};
  if (now == 0) {
    console.log('activeTab == 0');
    $('.tab-pane').hide();
    $('#1-content').addClass('active');
    $('#1-content').show();
    $('#1').css({
       'border-bottom': '4px solid #ddd',
    });
  }
  else{
    console.log('activeTab != 0');
    
    $('.tab-pane').hide();
    $('#'+ localStorage.getItem('activeTab')+'-content').addClass('active');
    $('#'+ localStorage.getItem('activeTab')+'-content').show();
    $('#'+ localStorage.getItem('activeTab')).css({
       'border-bottom' : '4px solid #ddd',
    });
  }
    
    $('.tab').click(function() {
    //e.preventDefault();
    let id = $(this).attr("id");  
    console.log(id);
    localStorage.setItem('activeTab', id);
    //var now2={{ json_encode(session()->get('now')) }};
   // console.log(now2);
    $('.tab-pane').hide();
    $('.tab-pane').removeClass('active');
    $('#'+id+'-content').addClass('active');
    // Show the selected form
    $('#'+id+'-content').show();
    $('.tab').css({
       'border-bottom': 'none',
    });
    $(this).css({
       'border-bottom': '4px solid #ddd',
    });
   // setSessionVariable('IsInArticle', 0);
    });
    
    });
   
  
        </script>
</body>
</html>
