@extends('layouts/navbar')
@section('style')
<link rel="stylesheet" href="{{asset('css/style.css')}}">
@endsection
@section('title' , 'News')
@section('content')
<header>
    <p>Admin page</p>
    
   </header>
   <nav>
   
    
 </nav>

      <div class="tab-content">
        <div class="tab-pane" id="tab1-content">
          <!-- Tab 1 content here -->
          <a  href="{{route('news.create')}}" class="plus-button" id="addButton" >
            <i class="fas fa-plus"></i>
            Add
            </a>
            
          <table class="table table-bordered text-center">
                <tr class="bg-dark text-white">
                  <th> News name </th>
                  <th> News url </th>
                  <th> News category </th>
                  <th> id langue </th>
                  <th colspan="2"> Action </th>
                 
                </tr>
                
                    
                
                <form >
                @if(isset($data))
                @forEach($data as $item)
                <tr>
                  <td>{{$item['News_name']}}</td>
                  <td>{{$item['News_url']}}</td>
                  <td>{{$item['News_category']}}</td>
                  <td>{{$item['id_langue']}}</td>
                 <td><a href="{{route('news.edit',$item['id'])}}" class = "edit" type="submit" name="edit" >Edit</a></td>  
                  <td> 
                    <form action="{{route('news.destroy',$item['id'])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class = "delete" type="submit" name="delete">Delete</button>
                    </form>
            
                </td> 
                </tr>
                  @endforeach
                  @endif
                  </form>

              </table>

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