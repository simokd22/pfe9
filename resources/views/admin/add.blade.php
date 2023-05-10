@extends('layouts/navbar')
@section('style')
<link rel="stylesheet" href="{{asset('css/style_add.css')}}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<style>
   .form-container {
     margin-top: 100px; /* Adjust the margin-top value to create space below the navbar */
     margin-bottom: 100px; /* Adjust the margin-bottom value if needed */
     height: 508px;
  
   }
   
 </style>
@endsection
@section('title' , 'Add news')
@section('content')

<div class="container">
   <form method="POST" action="{{route('news.store')}}">
      @csrf
<div class="row justify-content-center">
<div class="col-md-6 shadow form-container">
   <div class="input-group mb-3">
   <span class="input-group-text" id="basic-addon1"></span>
   <input type="text" class="form-control" placeholder="News_name"  name="News_name" aria-label="News_name" aria-describedby="News_name" required>
 </div>
 <div class="mb-3">
   <label for="basic-url" class="form-label"> URL</label>
   <div class="input-group">
     <span class="input-group-text" id="basic-addon3">https://example.com</span>
     <input type="text" class="form-control"  name="News_url" id="News_url" aria-describedby="News_url"required>
   </div>
   <div class="form-text" id="basic-addon4">Example help text goes outside the input group.</div>
 </div>

 <div class="input-group mb-3">
   <input type="text" class="form-control" name="News_category" id="News_category" placeholder="News_category" aria-label="News_category" aria-describedby="News_category" required>
   <span class="input-group-text" id=""></span>
 </div>
 
 
 
 <div class="input-group mb-3">
   <span class="input-group-text"></span>
   <input type="text" class="form-control" name="News_title" id="News_title" aria-label="News_title" placeholder="News_title" required>
   <span class="input-group-text"></span>
 </div>
 
 <div class="input-group mb-3">
   <input type="text" class="form-control"   name="News_content" id="News_content" placeholder="News_content" aria-label="News_content" required>
   <span class="input-group-text"></span>
   <input type="text" class="form-control" name="News_image" id="News_image" placeholder="News_image" aria-label="News_image" required>
 </div>
 
 <div class="input-group mb-3">
   <input type="text" class="form-control" name="News_date" id="News_date"  placeholder="News_date" aria-label="News_date" required>
   <span class="input-group-text"></span>
 </div>
 
 <div class="input-group">
   <select style="color: gray" name="id_langue" id="id_langue" class="form-select" aria-label="Disabled select example"  required>
     <option value="id">Select Id</option>
     <option value="1">1-Arabe</option>
     <option value="2">2-Francais</option>
     <option value="3">3-Anglais</option>
   </select>
</div>   
   <div class="row">
      <div class="col-md-6">
         <div class="form-group">
             <button type="submit" class="btn btn-primary">Add</button>
</div>
</form>
</div>
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
{{----}}