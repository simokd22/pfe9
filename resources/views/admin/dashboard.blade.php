@extends('layouts/navbar')
@section('title' , 'dashboard')
@section('content')
@section('style')
<link rel="stylesheet" href="{{asset('css/style_dashboard.css')}}">
<script src="https://kit.fontawesome.com/3ac08d279f.js" crossorigin="anonymous"></script>
<header>
<h1>User Table</h1>
</header>
@endsection

<div class="tab-content">
    <div class="tab-pane" id="tab1-content">
      <!-- Tab 1 content here -->

      <table class="table table-bordered text-center">
            <tr class="bg-dark text-white">
              <th> Name </th>
              <th> email </th>
              <th colspan="2"> Action</th>
            </tr>
            
                
            
            <form >
            @if(isset($Userdata))
            @forEach($Userdata as $item)
            <tr>
              <td>{{$item['name']}}</td>
              <td>{{$item['email']}}</td>
             
    
              <td> 
                    <form action="{{route('Userinfo.destroy',$item['id'])}}" method="POST">
                        @csrf
                        
                          @method('DELETE')
                          <button class = "delete" type="submit" name="delete" style="color: #ff5252;border:none; cursor: pointer;" ><i class="fa-solid fa-trash"></i></button>
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
