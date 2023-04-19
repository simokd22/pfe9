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
        background-color: #fffcfc;
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
        font-size: 40px;
        text-align: center;
        direction: ltr;
    }
.cat-date{
    font-size: 18px;
}
    .date{
        display: flex;
        flex-direction: row;
        padding-bottom: 10px;
        color: gray;
        font-weight: bold;
        direction: ltr;
    }
    .date span{
        padding: 15px 12px 0 0px
    }
    article p{
        color: rgb(20, 19, 19);
        font-size: 25px;
        text-align: justify;
        line-height: 1.5;
        font-weight: bold;
        direction: ltr;
    }
    i{
        color: rgb(151, 151, 151);
        margin-top: 19px;
        padding: 0 10px;

    }




    </style>
    <body>
     <div class="blogpost">
            <p class="title"> {{ $article['title'] }}</p>
        <div class="image">
            <img src="{{ $article['image'] }}" alt="" >
        </div>
        <div class="date">
            <p class="cat-date">{{ $article['category'] }}</p>
            <span> | </span>
            <i class="fas fa-clock" style="float: right;"></i>
            <p class="cat-date">  {{ $article['date'] }} </p>
        </div>
    <article>
        <p>{!! nl2br($article['text']) !!}</p>
    </article>
 </div >
     
</body>
</html>
