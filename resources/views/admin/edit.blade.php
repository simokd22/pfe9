@extends('layouts/navbar')
@section('style')
<link rel="stylesheet" href="{{asset('css/style_edit.css')}}">
@endsection
@section('title' , 'Edit news')
@section('content')
<div class="container">
         <header>edit</header>
         <form action="{{route('news.update' , $datafind->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="input-field" >
               <input type="text" value="{{$datafind->News_name}}" name="News_name"  required>
               <label>News name</label>
            </div>
            <div class="input-field">
                <input type="text" value="{{$datafind->News_url}}" name="News_url" required>
                <label>News url</label>
             </div>
             <div class="input-field">
                <input type="text" value="{{$datafind->News_category}}" name="News_category" required>
                <label>News category</label>
             </div>
             <div class="input-field">
               <input type="text" value="{{$datafind->News_title}}" name="News_title" required>
               <label>News title</label>
            </div>
            <div class="input-field">
               <input type="text" value="{{$datafind->News_image}}" name="News_image" required>
               <label>News image</label>
            </div>
            <div class="input-field">
               <input type="text" value="{{$datafind->News_content}}" name="News_content" required>
               <label>News content</label>
            </div>
            <div class="input-field">
               <input type="text" value="{{$datafind->News_date}}" name="News_date" required>
               <label>News date</label>
            </div>
             <div class="input-field">
                <input type="text" value="{{$datafind->id_langue}}" name="id_langue" required>
                <label>id langue</label>
             </div>
            
             <div class="button" >
                <div class="inner"></div>
                <button type="submit">edit</button>
             </div>
        </form>
      </div>
      <script>
        $("#add-button").click(function() {
  $.ajax({
    url: "addbutton.php",
    success: function(data) {
      $("#add-form").html(data);
    }
  });
});

      </script>
@endsection