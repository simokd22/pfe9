
@extends('layouts/navbar_user')
@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
<link rel="stylesheet" href="{{ asset('css/style_article.css') }}">
<link rel="stylesheet"  href="https://www.fontstatic.com/f=sky-bold" />
<script src="https://kit.fontawesome.com/3ac08d279f.js" crossorigin="anonymous"></script>
@endsection
@section('title' , 'search')
@section('content')
     

	<body >
        <div style="margin-top:40px;" class="back">
            <a href="{{ url()->previous() }}"  class="back-btn"><i class="fas fa-arrow-left"></i>Back</a>
      </div>
     <div class="blogpost">
        <h1  class="title"> {{ $data[$news][$id]['title'] }}</h1>
        <div class="image">
            <img src="{{ $data[$news][$id]['image'] }}" alt="" >
        </div>
        <div class="date">
            <p>{{ $data[$news][$id]['category'] }}</p>
            <span> | </span>
            <i style="color: rgb(151, 151, 151); margin-top: 22px; padding: 0 10px;" class="fas fa-clock" style="float: right;"></i>
            <p>  {{ $data[$news][$id]['date'] }} </p>
        </div>
    <article>
        <p>{!! nl2br($data[$news][$id]['text']) !!}</p>


    </article>
 </div >
     {{-- <h2 class="other-articles">مقالات ذات صلة: </h2>
     <div class="blog-container">
        @php
        $index = $id + 1;
        $key = $id;
        $count = 0;
        @endphp
        @for ($i = 0; $i < 8; $i++)
            @if ($key == $index || $count == 3)
                @break
            @else
                @if ($index == count($data[$news]) - 1)
                    @php
                    $i--;
                    $index = 0;
                    @endphp
                @endif
                <div class="blog" style="flex-basis: calc(33.33% - 10px);">
                    <img src="{{ $data[$news][$index]['image'] }}" alt="" loading="lazy" decoding="async">
                    <div class="blog-info">
                        <p class="blog-date">{{ $data[$news][$index]['date'] }}</p>
                        <a href="{{ route('user.article',['news'=>$news,'id'=>$index]) }}" class="blog-title">{{ $data[$news][$index]['title'] }}</a>
                    </div>
                </div>
                @php
                $index++;
                $count++;
                @endphp
            @endif
        @endfor
    </div> --}}
    <footer>
        <p>copyright 2023-2024</p>
      </footer>
    
    <script src="{{ asset('js/article.js') }}"></script>
</body>
@endsection

