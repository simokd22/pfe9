@extends('layouts/navbar')
@section('style')
<link rel="stylesheet" href="{{asset('css/style.css')}}">
<script src="https://kit.fontawesome.com/3ac08d279f.js" crossorigin="anonymous"></script>
@endsection
@section('title' , 'News')


@section('content')


<header>
    <p>Langues</p>
</header>
   <nav>


 </nav>

      <div class="tab-content">
        <div class="tab-pane" id="tab1-content">
          <!-- Tab 1 content here -->
          <a href="{{route('langues.create')}}" class="plus-button" id="addButton" data-toggle="modal" data-target="#exampleModalCenter">
            <i class="fas fa-plus"></i>
            Ajouter
          </a>


          <table class="table table-bordered text-center">
                <tr class="bg-dark text-white">
                  <th>langue</th>
                  <th colspan="2"> Action </th>
                </tr>



                <form >
                @if(isset($data))
                @forEach($data as $item)
                <tr>
                  <td>{{$item['langue']}}</td>

                 <td><a href="{{route('langues.edit',$item['id'])}}" class = "edit" type="submit" name="edit" ><i class="fa-solid fa-pen"></i></a></td>
                  <td>
                    <form action="{{route('langues.destroy',$item['id'])}}" method="POST">
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
