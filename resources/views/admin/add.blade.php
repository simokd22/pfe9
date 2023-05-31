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
   
 </style>
@endsection
@section('title' , 'Add news')
@section('content')

<div class="container">
  <header>
    <h1>Add page</h1>
  </header>
   <form method="POST" action="{{route('guessScrapingElements')}}">{{-- guessScrapingElements --}}{{-- news.store --}}
      @csrf

      
<div class="row justify-content-center ">
<div class="col-md-6">
   <div class="input-group mb-3">
   <span  id="basic-addon1"></span>
   <input type="text" class="form-control" placeholder="News name"  name="News_name" aria-label="News_name" aria-describedby="News_name" required>
 </div>
 <div class="mb-3">
   
   <div class="input-group">
     <input type="text" class="form-control"  name="News_url" id="News_url" aria-describedby="News_url"required placeholder="https://example.com">
     <input type="text" hidden value="{{ csrf_token() }}" id="csrf-token">
     <button style="width: 100px;" type="submit"{{-- button --}}{{-- submit --}} class="btn btn-primary" {{--id="auto-fill"--}}  >Auto-fill</button>  
    </div>
   <div class="form-text" id="basic-addon4">Url must be like: https://example.com </div>
 </div>

 <div class="input-group mb-3">
   <input type="text" class="form-control" name="News_category" id="News_category" placeholder="News category" aria-label="News_category" aria-describedby="News_category" required>
   
 </div>
 
 
 
 <div class="input-group mb-3">
  
   <input type="text" class="form-control" name="News_title" id="News_title" aria-label="News_title" placeholder="News title" required>
   
 </div>
 
 <div class="input-group mb-3">
   <input type="text" class="form-control"   name="News_content" id="News_content" placeholder="News content" aria-label="News_content" required>
   <span class="input-group-text"></span>
   <input type="text" class="form-control" name="News_image" id="News_image" placeholder="News image" aria-label="News_image" required>
 </div>
 
 <div class="input-group mb-3">
   <input type="text" class="form-control" name="News_date" id="News_date"  placeholder="News date" aria-label="News_date" required>
  
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
             <button style="width: 100px; margin-top:30px;" type="submit" class="btn btn-primary" > Add</button>
</div>
</form>
</div>
</div>
</div>
</div>
</div>

<div id="Modal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">Test Article</h4>
      <button class="close" type="button" id="CloseModalX" aria-label="Close" onclick="CloseModalfn()"><span aria-hidden="true">×</span></button>
    </div>
    <div class="modal-body">
      <div class="card-body d-flex justify-content-around flex-wrap ">
        
      </div>
    </div>
    <div class="modal-footer d-flex justify-content-start ml-xl-5">
      <button class="btn btn-default " type="button" id="CloseModalBtn" onclick="CloseModalfn()">Close</button>
      <button class="btn btn-success " type="submit" >Save</button>
    </div>
  </div>
</div> 

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script  src="{{ asset('js/modal.js') }}"></script> 
      <script>
/*         $("#add-button").click(function() {
  $.ajax({
    url: "addbutton.php",
    success: function(data) {
      $("#add-form").html(data);
    }
  });
}); */
      $(document).ready(function(){
        $('#auto-fill').click(function(){
          var url=$('#News_url').val();
          var keyword= prompt("prompt");
          if(keyword!='' && keyword!=null){
          $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('#csrf-token').val()
            }
          });
          $.ajax({
           type:'POST',
           url:"{{ route('guessScrapingElements') }}",
           data:{url:url,keyword:keyword},
           success:function(result){
              //alert(result.data);
              //$('.card-body').empty();
              //$('.card-body').append(result['html']);
              //OpenModalfn();
              $('#News_title').val(result.titleClass);
              $('#News_date').val(result.dateClass);
              $('#News_content').val(result.contentClass+' > p');
              $('#News_image').val(result.imageClass);
           },
           error: function(xhr, status, error) {
              console.log(xhr.responseText); 
              console.log(error); 
           }

        });
      }
        });
      });
      </script>
@endsection
{{----}}