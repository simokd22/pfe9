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
@section('title' , 'Add Langues')
@section('content')

<div class="container">
  <header>
    <h1>Ajouter</h1>
  </header>
   <form method="POST" action="{{route('langues.store')}}">
      @csrf


<div class="row justify-content-center ">
<div class="col-md-6">
   <div class="input-group mb-3">
   <span  id="basic-addon1"></span>
   <input type="text" class="form-control" placeholder="langue"  name="langue" aria-label="langue" aria-describedby="langue" required>
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


@endsection
{{----}}
