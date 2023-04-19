<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">

</head>


<style>

    *{
      box-sizing: border-box;
    }


    body{
        margin: 0 15%;
        background-color: #f4f4f4;
        font-family: 'Cairo';



    }
.blogpost{
    display: flex;
    flex-direction: column;
    align-items: center;
}
.image img{
  width: 680px;
}
    .title{
        font-family: 'Cairo', sans-serif;
        font-size: 40px;
        text-align: center;
        direction: rtl;
    }

    .date{
        display: flex;
        flex-direction: row;
        padding-bottom: 10px;
        color: gray;
        font-weight: bold;
        direction: rtl;
        font-size: 18px;
    }
    .date span{
        padding: 15px 12px 0 0px
    }
    article p{
        color: rgb(20, 19, 19);
        font-size: 25px;
        font-family: 'Cairo';
        text-align: justify;
        line-height: 1.5;
        font-weight: bold;
        direction: rtl;
    }
    i{
        color: rgb(151, 151, 151);
        margin-top: 19px;
        padding: 0 10px;

    }


    .blog-container {
    display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  justify-items: right;
  font-family: Arial, Helvetica, sans-serif;
}

.blog {
    position: relative;
  width: calc(25% - 15px);
  margin-bottom: 30px;
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
  height: 180px;
}


.blog-info {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  box-shadow: 0px 10px 20px -10px rgba(0, 0, 0, 0.2);
  padding: 10px 10px 10px 10px ;
  color: rgb(236, 236, 236);
  font-family: 'Poppins', sans-serif;
  font-size: 14px;
  transition: all 0.1s ease-in-out;

}

.blog-date {
  margin-bottom: 5px;
  transition: all 0.1s ease-in-out;
  font-size: 12px;
  margin-top: 20px;

}

.blog-title {
  font-weight: bold;
  font-size: 15px;
  transition: all 0.1s ease-in-out;
  margin-bottom: 5px;

}

.blog:hover .blog-date {
  opacity: 0;
}


.blog:hover .blog-title {
  font-size: 20px;
}
.blog-info a{
    color: #ffffff;
    text-decoration: none;
    text-decoration-line: none;
    text-decoration-thickness: initial;
    text-decoration-style: initial;
    text-decoration-color: initial;
    background-color: transparent;
    cursor: pointer;
    color: var(--textColor);
}
.other-articles{
    font-size: 40px;
    margin: 80px 0 20px 0;
    direction: rtl;
}


    </style>
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
</body>
</html>
