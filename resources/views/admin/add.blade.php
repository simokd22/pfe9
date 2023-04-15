@extends('layouts/navbar')
@section('style')
<link rel="stylesheet" href="{{asset('css/style_add.css')}}">
@endsection
@section('title' , 'Add news')
@section('content')
<div class="container">
         <header>Add</header>
         <form method="POST" action="{{route('news.store')}}">
            @csrf
            <div class="input-field">
               <input type="text" name="News_name" id="News_name"  required>
               <label>News_name</label>
            </div>
            <div class="input-field">
                <input type="text"name="News_url" id="News_url" required>
                <label>News_url</label>
             </div>
             <div class="input-field">
                <input type="text" name="News_category" id="News_category" required>
                <label>News_category</label>
             </div>
             <div class="input-field">
               <input type="text" name="News_title" id="News_title" required>
               <label>News_title</label>
            </div>
            <div class="input-field">
               <input type="text" name="News_image" id="News_image"  required>
               <label>News_image</label>
            </div>
            <div class="input-field">
               <input type="text" name="News_content" id="News_content" required>
               <label>News_content</label>
            </div>
            <div class="input-field">
               <input type="text" name="News_date" id="News_date" required>
               <label>News_date</label>
            </div>
             <div class="input-field">
                <input type="text" name="id_langue" id="id_langue" required>
                <label>id_langue</label>
             </div>
            
             <div class="button">
                <div class="inner"></div>
                <button type="submit">Add</button>
             </div>
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