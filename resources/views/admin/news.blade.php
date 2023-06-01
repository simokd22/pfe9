@extends('layouts/navbar')
@section('style')
<link rel="stylesheet" href="{{asset('css/style.css')}}">
<script src="https://kit.fontawesome.com/3ac08d279f.js" crossorigin="anonymous"></script>
@endsection
@section('title' , 'News')


@section('content')
  

<header>
    <p>Section nouvelle</p> 
</header>
   <nav>
   
    
 </nav>

      <div class="tab-content">
        <div class="tab-pane" id="tab1-content">
          <!-- Tab 1 content here -->
          <a href="{{route('news.create')}}" class="plus-button" id="addButton" data-toggle="modal" data-target="#exampleModalCenter">
            <i class="fas fa-plus"></i>
            Ajouter
          </a>
          
            
          <table class="table table-bordered text-center">
                <tr class="bg-dark text-white">
                  <th>Nom</th>
                  <th>URL</th>
                  <th>Catégorie</th>
                  <th>Titre</th>
                  <th>Image</th>
                  <th>Contenu</th>
                  <th>La date</th>
                  <th>ID de langue</th>
                  <th colspan="2"> Action </th>
                 
                </tr>
                
                    
                
                <form >
                @if(isset($data))
                @forEach($data as $item)
                <tr>
                  <td>{{$item['News_name']}}</td>
                  <td>{{$item['News_url']}}</td>
                  <td>{{$item['News_category']}}</td>
                  <td>{{$item['News_title']}}</td>
                  <td>{{$item['News_image']}}</td>
                  <td>{{$item['News_content']}}</td>
                  <td>{{$item['News_date']}}</td>
                  <td>{{$item['id_langue']}}</td>
                 <td><a href="{{route('news.edit',$item['id'])}}" class = "edit" type="submit" name="edit" ><i class="fa-solid fa-pen"></i></a></td>  
                  <td> 
                    <form action="{{route('news.destroy',$item['id'])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class = "delete" type="submit" name="delete"><i class="fa-solid fa-trash"></i></button>
                        
                    </form>
            
                </td> 
                </tr>
                  @endforeach
                  @endif
                  </form>

              </table>

        </div>
        
       
      </div>

</div>



      <script>
        const tabs = document.querySelectorAll(".tab");
        const tabContents = document.querySelectorAll(".tab-pane");
      
        tabs.forEach(function(tab) {
          tab.addEventListener("click", function() {
            const tabId = this.id;
      
            tabs.forEach(function(tab) {
              tab.classList.remove("active");
            });
            this.classList.add("active");
      
            tabContents.forEach(function(tabContent) {
              tabContent.style.display = "none";
            });
            document.getElementById(tabId + "-content").style.display = "block";
          });
        });
      </script>


@endsection