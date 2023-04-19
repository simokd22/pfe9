@extends('layouts/navbar')
@section('title' , 'dashboard')
@section('content')
@section('style')
<link rel="stylesheet" href="{{asset('css/style_dashboard.css')}}">
<header>
<h1>User Table</h1>
</header>
@endsection

<div class="tab-content">
    <div class="tab-pane" id="tab1-content">
      <!-- Tab 1 content here -->
      <a  href="{{route('news.create')}}" class="plus-button" id="addButton" >

      <table class="table table-bordered text-center">
            <tr class="bg-dark text-white">
              <th> Name </th>
              <th> email </th>
              <th> Action</th>
            </tr>
            
                
            
            <form >
            @if(isset($data))
            @forEach($data as $item)
            <tr>
              <td>{{$item['Name']}}</td>
              <td>{{$item['Email']}}</td>
             
    
              <td> 
                    <form action="{{route('news.destroy',$item['id'])}}" method="POST">
                        @csrf
                        @method('MAKEADMIN') <!--le nom de methode-->
                        <button class = "make-admin" type="submit" name="make-admin">Make Admin</i></button>
                        
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