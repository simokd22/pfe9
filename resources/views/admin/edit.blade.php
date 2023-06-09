@extends('layouts/navbar')

@section('style')
<link rel="stylesheet" href="{{asset('css/style_edit.css')}}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<style>
   .form-container {
     
     margin-bottom: 100px; 
     height: 508px;
  
   }

   header{

    margin-top: 120px;
    margin-bottom: 30px;
    justify-content: center;
    display: flex;
   }
   
 </style>
@endsection
@section('title' , 'Edit news')
@section('content')

<div class="container">
   <header>
      <h1>Éditer</h1>
   </header>
         
         <form action="{{route('news.update' , $datafind->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="row justify-content-center">
               <div class="col-md-6 ">
                  <div class="input-group mb-3">
                  <span  id="basic-addon1"></span>
                  <input value="{{$datafind->News_name}}" type="text" class="form-control" placeholder="News name"  name="News_name" aria-label="News_name" aria-describedby="News_name" required>
                </div>
                <div class="mb-3">
                  
                  <div class="input-group">
                    
                    <input value="{{$datafind->News_url}}" type="text" class="form-control"  name="News_url" id="News_url" aria-describedby="News_url"required placeholder="https://example.com">
                  </div>
                  <div class="form-text" id="basic-addon4">L’URL doit ressembler à : https://example.com</div>
                </div>
               
                <div class="input-group mb-3">
                  <input value="{{$datafind->News_category}}" type="text" class="form-control" name="News_category" id="News_category" placeholder="News category" aria-label="News_category" aria-describedby="News_category" required>
                  
                </div>
                
                
                
                <div class="input-group mb-3">
                 
                  <input value="{{$datafind->News_title}}"  type="text" class="form-control" name="News_title" id="News_title" aria-label="News_title" placeholder="News title" required>
                  
                </div>
                
                <div class="input-group mb-3">
                  <input value="{{$datafind->News_content}}" type="text" class="form-control"   name="News_content" id="News_content" placeholder="News content" aria-label="News_content" required>
                  <span class="input-group-text"></span>
                  <input value="{{$datafind->News_image}}"  type="text" class="form-control" name="News_image" id="News_image" placeholder="News image" aria-label="News_image" required>
                </div>
                
                <div class="input-group mb-3">
                  <input value="{{$datafind->News_date}}" type="text" class="form-control" name="News_date" id="News_date"  placeholder="News date" aria-label="News_date" required>
                 
                </div>
                
                <div class="input-group">
                  <select value="{{$datafind->id_langue}}" style="color: gray" name="id_langue" id="id_langue" class="form-select" aria-label="Disabled select example"  required>
                    <option value="id">Sélectionnez l’ID</option>
                    @foreach (App\Models\Langue::all() as $langue)
                    <option value="{{ $langue->id }}" {{ $langue->id == $datafind['id_langue'] ? 'selected' : '' }}>{{ $langue->langue }}</option>
                    @endforeach
                  </select>
               </div>   
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                            <button style="width: 130px; margin-top:30px;" type="submit" class="btn btn-primary" >Sauvegarder</button>
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