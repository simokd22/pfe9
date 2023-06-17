@extends('layouts/navbar')

@section('style')
<link rel="stylesheet" href="{{asset('css/style_add.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/modal.css') }}">
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
   .cat-main{
    background-color: #c6cbc8;
    width: fit-content;
    padding:0 4px  ;
    margin:0 10px 4px 10px;
   }
   .cat-close{
      color: white;
      margin-left: 6px;
      font-size: 14px;
   }
   .cat-close:hover{
    cursor: pointer;
    color: black;
  }
  #added-categories{
    display: flex;
    flex-wrap: wrap;
  }

 </style>
@endsection
@section('title' , 'Add Categories')
@section('content')

<div class="container">
  <header>
    <h1>Ajouter</h1>
  </header>
   <form method="POST" action="{{route('Categories.update', $datafind->id)}}">{{-- guessScrapingElements --}}{{-- news.store --}}
    @csrf
    @method('PUT')

<div class="row justify-content-center ">
<div class="col-md-6">
   <div class="input-group mb-3">
   <span  id="basic-addon1"></span>
   <input type="text" class="form-control" placeholder="Catégorie" value="{{ $datafind['category_name'] }}" name="Categorie" aria-label="Categorie" aria-describedby="Categorie" required>
 </div>

 <div class="input-group mb-3">
   <input type="text" class="form-control" name="Synonym_category" id="Synonym_category" placeholder="Catégorie Synonym" aria-label="Synonym_category" aria-describedby="Synonym_category" >
   <input type="text" class="form-control" name="stored_Synonym_category" id="stored_Synonym_category"  hidden>
   <button style="width: 100px;" type="button" class="btn btn-primary" id="ajouter"  >Ajouter</button>
 </div>
 <div id="added-categories" >
      @foreach (json_decode($datafind['synonyms_categories']) as $key=>$synonym)
      <div class="cat-main">  
         {{ $synonym }}<span class="cat-close" data-id="{{ $key }}" >x</span>
      </div>
      @endforeach
 </div>



 <div class="input-group">
   <select style="color: gray; margin-top:6px;"  name="id_langue" id="id_langue" class="form-select" aria-label="Disabled select example"  required>
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
</div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <script>
      $(document).ready(function() {
        var categories = JSON.parse('{!! $datafind["synonyms_categories"] !!}');
        $("#stored_Synonym_category").val(JSON.stringify(categories));
        $('#ajouter').click(function() {
          if ($("#Synonym_category").val() != "") {
            categories.push($("#Synonym_category").val());
            $("#stored_Synonym_category").val(JSON.stringify(categories));
            $("#added-categories").html(""); // Updated line
            for (var i = 0; i < categories.length; i++) {
              $("#added-categories").html($("#added-categories").html() + "<div class='cat-main'>" + categories[i] + "<span class='cat-close' data-id='"+i+"' >x</span></div>");
            }
            $("#Synonym_category").val('');
          }
        });

        $(document).on('click', '.cat-close', function() {
          categories.splice($(this).data('id'), 1);
          $("#added-categories").html(""); // Updated line
            for (var i = 0; i < categories.length; i++) {
              $("#added-categories").html($("#added-categories").html() + "<div class='cat-main'>" + categories[i] + "<span class='cat-close' data-id='"+i+"' >x</span></div>");
            }
            $("#stored_Synonym_category").val(JSON.stringify(categories));
        });

      });

      </script>
@endsection
{{----}}
