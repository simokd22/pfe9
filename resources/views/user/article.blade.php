<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/style_article.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>



    <body>
     <div class="blogpost">
        <h1 class="title"> {{ $data[$news][$id]['title'] }}</h1>
        <div class="image">
            <img src="{{ $data[$news][$id]['image'] }}" alt="" >
        </div>
        <div class="date">
            <p>{{ $data[$news][$id]['category'] }}</p>
            <span> | </span>
            <i class="fas fa-clock" style="float: right;"></i>
            <p>  {{ $data[$news][$id]['date'] }} </p>
        </div>
    <article>
        <p>{!! nl2br($data[$news][$id]['text']) !!}</p>


    </article>
 </div >
     <h2 class="other-articles">مقالات ذات صلة: </h2>
    <div class="blog-container">
        @php
        $index= $id+1 ;
        $key=$id ;
        @endphp
        @for ($i=0;$i<8;$i++)
        @if ($key==$index)
            @break
        @else
        @if ($index==count($data[$news])-1)
        @php
        $i--;
        $index=0 ;
        @endphp

        @else
        <div class="blog">
        <img src="{{ $data[$news][$index]['image'] }}" alt="" loading="lazy" decoding="async">
        <div class="blog-info">
          <p class="blog-date">{{ $data[$news][$index]['date'] }}</p>
          <a href="{{ route('user.article',['news'=>$news,'id'=>$index]) }}" class="blog-title">{{ $data[$news][$index]['title'] }}</a>
        </div>
        </div>
        @php
        $index++ ;
        @endphp

        @endif
        @endif
        @endfor

    </div>
    <script src="{{ asset('js/article.js') }}"></script>
</body>
</html>
