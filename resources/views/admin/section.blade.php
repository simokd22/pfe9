@extends('layouts/navbar')
@section('style')
<link rel="stylesheet" href="{{asset('css/style_section.css')}}">
<script src="https://kit.fontawesome.com/3ac08d279f.js" crossorigin="anonymous"></script>
@endsection
@section('title' , 'Sections')
@section('content')
<header>
    <p>Sections</p>
    
</header>
   <nav>
   
    
 </nav>

      <div class="tab-content">
        <div class="tab-pane" id="tab1-content">
          <!-- Tab 1 content here -->
            <i class="fas fa-plus"></i>
            Add
            </a>
            
          <table class="table table-bordered text-center">
                <tr class="bg-dark text-white">
                  <th> Category </th>
                  <th> Language </th>
                  <th> Sites </th>
                  <th colspan="2"> Action </th>
                 
                </tr>
                
                    
                
                <form >
                @if(isset($data))
                @forEach($data as $item)
                <tr>
                  <td>{{$item['Category']}}</td>
                  <td>{{$item['Language']}}</td>
                  <td>{{$item['Sites']}}</td>
                  
               
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