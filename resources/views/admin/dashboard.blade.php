
<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Responsive Navigation Menu</title>
      <link rel="stylesheet" href="style.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
} 
nav{
display: flex;
height: 80px;
width: 100%;
background: #ffffff;
align-items: center;
justify-content: space-between;
margin-top: 80px;
margin-right: 500px;
flex-wrap: wrap;
margin-bottom: 30px;
float: right;

}
nav .logo{
  color: #fff;
  font-size: 35px;
  font-weight: 600;
}
nav ul{
  display: flex;
  flex-wrap: wrap;
  list-style: none;
  margin-right: 500px;
}
nav ul li{
  margin: 0 5px;
}
nav ul li a{
  color: gray;
  text-decoration: none;
  font-size: 18px;
  font-weight: 500;
  padding: 8px 15px;
  border-radius: 5px;
  letter-spacing: 1px;
  transition: all 0.3s ease;
}
nav ul li a.active,
nav ul li a:hover{
  color: #000000;
  background: #ffffff;
}
nav .menu-btn i{
  color: #fff;
  font-size: 22px;
  cursor: pointer;
  display: none;
}
input[type="checkbox"]{
  display: none;
}
@media (max-width: 1000px){
  nav{
    padding: 0 40px 0 50px;
  }
}
@media (max-width: 920px) {
  nav .menu-btn i{
    display: block;
  }
  #click:checked ~ .menu-btn i:before{
    content: "\f00d";
  }
  nav ul{
    position: fixed;
    top: 80px;
    left: -100%;
    background: #111;
    height: 100vh;
    width: 100%;
    text-align: center;
    display: block;
    transition: all 0.3s ease;
    text-align: center;
    }
  #click:checked ~ ul{
    left: 0;
  }
  nav ul li{
    width: 100%;
    margin: 40px 0;
  }
  nav ul li a{
    width: 100%;
    margin-left: -100%;
    display: block;
    font-size: 20px;
    transition: 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
  }
  #click:checked ~ ul li a{
    margin-left: 0px;
  }
  nav ul li a.active,
  nav ul li a:hover{
    background: none;
    color: cyan;
  }
}
.content{
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
  z-index: -1;
  width: 100%;
  padding: 0 30px;
  color: #1b1b1b;
}
.content div{
  font-size: 40px;
  font-weight: 700;
}

.tab-content {
  padding: 20px;
}

.table {
    width: 100%;
    margin: 0 auto;
    border-collapse: collapse;
  }

  .table td,
  .table th {
    border: 1px solid #ddd;
    padding: 8px;
  }

  .table tr:nth-child(even) {
    background-color: #f2f2f2;
  }

  .table th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #23507c;
    color: white;
  }

  .bg-dark {
    background-color: #333;
  }

  .text-white {
    color: #fff;
  }

  .tab-pane{
margin: 0 8%;
  }
  .plus-button{
    margin-bottom: 10px;
  }

  .edit{
    background-color: #4285f4;
    border-radius: 6px;
    border-color: #4285f4;
    color: white;
    padding: 4px 18px;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    border: none;
  }

  .delete{
    background-color: #ff5252;
    border-radius: 6px;
    border-color: #ff5252;
    color: white;
    padding: 4px 8px;
    border: none;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
  }

  .delete:active{
    transform: scale(1); 
  }

  .edit:active{
    transform: scale(1); 
  }
  .plus-button {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  display: inline-flex;
  align-items: center;
}

.plus-button i {
  margin-right: 10px;
  font-size: 20px;
}

header{
   text-align: center;
   margin-top: 30px;
   font-weight: lighter;
   font-family: 'Poppins', sans-serif;
   font-size: 30px;
} 
      </style>
   </head>
   <header>
    <p>Admin page</p>
   </header>
   <nav>
    <input type="checkbox" id="click">
    <label for="click" class="menu-btn">
    <i class="fas fa-bars"></i>
    </label>
    <ul>
       <li class="tab" id="tab1" ><a href="#">Table 1</a></li>
       <li class="tab" id="tab2" ><a href="#">Table 2</a></li>
       <li class="tab" id="tab3" ><a href="#">Table 3</a></li>
       <div class="line"></div>
    </ul>
 </nav>

      <div class="tab-content">
        <div class="tab-pane" id="tab1-content">
          <!-- Tab 1 content here -->
          <a  class="plus-button" id="addButton" >
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
                 <td><a href="{{route('admin.edit',$item['id'])}}" class = "edit" type="submit" name="edit" >Edit</a></td>  
                  <td> <button class = "delete" type="submit" name="delete">Delete</button></td> 
                </tr>
                  @endforeach
                  @endif
                  </form>

                
            
              </table>

        </div>
        <div class="tab-pane" id="tab2-content">
          
          <!-- Tab 2 content here -->
        </div>
        <div class="tab-pane" id="tab3-content">
          
          <!-- Tab 3 content here -->
        </div>
      </div>

      <!--<div class="content">
         <div>
            Responsive Navigation Menu Bar Design
         </div>
      </div>-->

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
      
   </body>
</html>