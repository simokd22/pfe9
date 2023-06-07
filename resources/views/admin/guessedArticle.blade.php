<p style="font-size: 14px">to see the real article you can go </p><a href="{{ $data['url'] }}" style="font-size: 14px">here</a>
<div class="blogpost">
    <h1  class="title"> {{ $data['title'] }}</h1>
    <div class="image">
        <img src="{{ $data['image'] }}" alt="" style="height: 170px" >
    </div>
    <div class="date">
        <p>{{ $data['category'] }}</p>
        <span> | </span>
        <i style="color: rgb(151, 151, 151); margin-top: 22px; padding: 0 10px;" class="fas fa-clock" style="float: right;"></i>
        <p>  {{ $data['date'] }} </p>
    </div>
    <article>
        <p>{!! nl2br($data['text']) !!}</p>
    </article>
 </div>   
 <link rel="stylesheet" type="text/css" href="{{ asset('css/style_guessarticle.css') }}">



