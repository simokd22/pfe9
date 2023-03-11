
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title> Animated Search Bar </title>
        <!-- CSS -->
        <!-- Unicons CSS -->
 <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
<style>
         /* Google Fonts - Poppins */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');

*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
body{
  height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  background: #f4f4f4;
  overflow: hidden;
}
.input-box{
  position: relative;
  height: 55px;
  max-width: 55px;
  width: 100%;
  margin: auto;
  border-radius: 6px;
  background-color: #fff;
  transition: all 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
  
}
.input-box.open{
  max-width: 640px;
  margin-right: 60px;
}
input{
  position: relative;
  outline: none;
  border: none;
  height: 100%;
  width: 100%;
  border-radius: 6px;
  font-size: 16px;
  font-weight: 400;
  color: #333;
  background-color: #fff;
}
.input-box.open{
  padding: 0 15px 0 65px;
}
.icon{
  position: absolute;
  height: 100%;
  top: 0;
  left: 0;
  width: 60px;
  border-radius: 6px;
  display: flex;
  justify-content: center;
  background-color: #fff;
  
}
.search-icon,
.close-icon{
  position: absolute;
  top: 50%;
  font-size: 30px;
  transition: all 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
}
.search-icon{
  color: #4070f4;
  
  transform: translateY(-50%) rotate(90deg);
}
.input-box.open .search-icon{
  transform: translateY(-50%) rotate(0);
}
.close-icon{
  right: -45px;
  color: #ff5252;
  padding: 5px;
  opacity: 0;
  pointer-events: none;
  transform: translateY(-50%);
}
.input-box.open .close-icon{
  opacity: 1;
  pointer-events: auto;
  transform: translateY(-50%) rotate(180deg);
}

.container {
  display: flex;
  flex-direction: column;
  height: 100vh;
  align-items: center;
  justify-content: center;
  background: #f4f4f4;
  position: fixed;
}

.form {
  margin: auto;
  margin-top: 60px; /* Changed from 5px */
  padding-top: 20px;

  }
  

  .dates {
    display: flex;
    margin-top: 20px;
  }
  



.select {
  width: 20%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  font-size: 16px;
}

::selection{
  color: #fff;
  background: #4285f4;
}
.wrapper,.wrapper1,.wrapper2{
  width: 220px;
  margin: 20px auto 0;
 
}

.select-btn span,.select-btn1 span,.select-btn2 span{
  text-align: center;
}
.select-btn,.select-btn1,.select-btn2, li{
  display: flex;
  align-items: center;
  cursor: pointer;
  
}
.select-btn,.select-btn1,.select-btn2{
  height: 40px; /* decreased height */
  width: 200px;
  padding: 0 20px;
  font-size: 16px; /* decreased font size */
  background: #fff;
  border-radius: 7px;
  justify-content: space-between;
  box-shadow: 0 10px 25px rgba(0,0,0,0.1);
  
}
.select-btn i,.select-btn1 i,.select-btn2 i{
  font-size: 20px; /* decreased font size */
  transition: transform 0.3s linear;
}
.wrapper.active .select-btn i,.wrapper1.active .select-btn1 i,.wrapper2.active .select-btn2 i{
  transform: rotate(-180deg);
}
.content,.content1,.content2{
  display: none;
  width: 200px;
  padding: 20px;
  margin-top: 15px;
  background: #fff;
  border-radius: 7px;
  box-shadow: 0 10px 25px rgba(0,0,0,0.1);
  position: fixed;  
}
.wrapper.active .content,.wrapper1.active .content1,.wrapper2.active .content2{
  display: block;
}
.content .search,.content1 .search,.content2 .search{
  position: relative;
}
.search i{
  top: 50%;
  left: 15px;
  color: #999;
  font-size: 20px;
  pointer-events: none;
  transform: translateY(-50%);
  position: absolute;
}
.search input{
  height: 50px;
  width: 100%;
  outline: none;
  font-size: 17px;
  border-radius: 5px;
  padding: 0 20px 0 43px;
  border: 1px solid #B3B3B3;
}
.search input:focus{
  padding-left: 42px;
  border: 2px solid #4285f4;
}
.search input::placeholder{
  color: #bfbfbf;
}
.content .options,.content1 .options1,.content2 .options2{
  margin-top: 10px;
  max-height: 100px;
  overflow-y: auto;
  padding-right: 7px;
}
.options::-webkit-scrollbar,.options1::-webkit-scrollbar,.options2::-webkit-scrollbar{
  width: 7px;
}
.options::-webkit-scrollbar-track,.options1::-webkit-scrollbar-track,.options2::-webkit-scrollbar-track{
  background: #f1f1f1;
  border-radius: 25px;
}
.options::-webkit-scrollbar-thumb,.options1::-webkit-scrollbar-thumb,.options2::-webkit-scrollbar-thumb{
  background: #ccc;
  border-radius: 25px;
}
.options::-webkit-scrollbar-thumb:hover,.options1::-webkit-scrollbar-thumb:hover,.options2::-webkit-scrollbar-thumb:hover{
  background: #b3b3b3;
}
.options li,.options1 li,.options2 li{
  height: 50px;
  padding: 0 13px;
  font-size: 15px;
}
.options li:hover,.options1 li:hover,.options2 li:hover, li.selected{
  border-radius: 5px;
  background: #f2f2f2;
}

.selects {
  display: flex;
  align-items: center;
  justify-content: center;
}
.wrapper3 {
  margin-top: 20px;
  display: flex;
  align-items: center;
  justify-content: center; 
  padding-bottom: 20px;
  
}

.wrapper3 input {
  padding-left: 20px; 
  margin-right: 20px;
  margin-left: 20px;
  
  }
  
.label{
  text-size-adjust: 10px;
}
.divs{
  display: inline-block;
  z-index: 2;
  
}

.divs3{
  display: inline-block;
  z-index: 0;
}

footer {
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  /*background-color: rgb(0, 0, 0);*/
  color: #2c2c2c;
  text-align: center;
  padding: 20px;
  font-weight: lighter;
  font-size: 12px;
}

button{
  position: relative;
  display: inline;
  height: 30px;
  width: 70px;
  border: none;
  outline: none;
  color: white;
  background: #2c2c2c;
  cursor: pointer;
  border-radius: 5px;
  font-size: 14px;
  font-family: 'Raleway', sans-serif;
  margin: 10px;
 
}
button:before{
  position: absolute;
  content: '';
  top: -2px;
  left: -2px;
  height: calc(100% + 4px);
  width: calc(100% + 4px);
  border-radius: 5px;
  z-index: -1;
  opacity: 0;
  filter: blur(5px);
  background-size: 400%;
  transition: opacity .3s ease-in-out;
  animation: animate 20s linear infinite;
}
button:hover:before{
  opacity: 1;
}
button:hover:active{
  background: none;
}
button:hover:active:before{
  filter: blur(2px);
}
@keyframes animate {
  0% { background-position: 0 0; }
  50% { background-position: 400% 0; }
  100% { background-position: 0 0; }
}


                     </style>
          </head>
          <body>
    
        <div class="container">
        <form  action="{{route('userstore')}}" method="GET" >
            @csrf
            <div class="input-box">
              <input type="text" placeholder="Search..." name="keyword" id="query" >
              <span class="icon">
                <i class="uil uil-search search-icon"></i>
              </span>
              <i class="uil uil-times close-icon"></i>
            </div>
           

              <div class="selects">
                <form class="divs">
                  <div class="wrapper1">
                    <div class="select-btn1">
                      <span>Select Category</span>
                      <i class="uil uil-angle-down"></i>
                    </div>
                      <div class="content1">
                        <div class="search">
                          <i class="uil uil-search"></i>
                          <input spellcheck="false" type="text" placeholder="Search" name="category" id="category" value="category">
                        </div>
                      <ul class="options1">
                    </div>
                  </div> 
                </form>
                <form class="divs">
                  <div class="wrapper">
                    <div class="select-btn">
                      <span>Select Language</span>
                      <i class="uil uil-angle-down"></i>
                    </div>
                    <div class="content">
                      <div class="search">
                        <i class="uil uil-search"></i>
                        <input spellcheck="false" type="text" placeholder="Search" name="language" id="language" value="language">
                      </div>
                      <ul class="options">
                    </div>
                  </div> 
                </form>
                <form class="divs" disabled="true" >
                  <div class="wrapper2">
                    <div class="select-btn2">
                      <span>Select Sites</span>
                      <i class="uil uil-angle-down"></i>
                    </div>
                    <div class="content2">
                      <div class="search">
                        <i class="uil uil-search"></i>
                        <input spellcheck="false" type="text" placeholder="Search" name="name_site" id="name_site" value="name_site">
                      </div>
                      <ul class="options2">
                    </div>
                  </div>
                </form>
              </div>
              <form class="divs2">
                <div class="wrapper3">
                 <label >Du:</label>  <input type="date" name="start_date" id="start_date" value="start_date">
                 <label>Au:</label> <input type="date" name="end_date" id="end_date" value="end_date">
                </div>
              </form>

              <form class="divs3">
                <div class="buttons">
                  <button class="search-btn" type="submit">Search</button>
                  <button class="reset-btn" type="reset">Reset</button>
                </div>
              </form>
              @if (session('value'))
              {{ session('value') }}
              @endif
            </form>
          
            <footer>
              <p>copyright 2023-2024</p>
            </footer>
            
          </div>
        
          <script>
            
            let inputBox = document.querySelector(".input-box"),
                searchIcon = document.querySelector(".icon"),
                closeIcon = document.querySelector(".close-icon");

            searchIcon.addEventListener("click", () => inputBox.classList.add("open"));
            closeIcon.addEventListener("click", () => inputBox.classList.remove("open"));

            /*----------------------------------------------------------------------------------*/
            const wrapper3 = document.querySelector(".wrapper2"),
            selectBtn3 = wrapper3.querySelector(".select-btn2"),
            searchInp3 = wrapper3.querySelector("input"),
            options3 = wrapper3.querySelector(".options2");

let countriee = ["Hespress", "Al3omeq", "24h","Today","site2"];

function addCountry3(selectedCountry3) {
    options3.innerHTML = "";
    countriee.forEach(country3 => {
        let isSelected = country3 == selectedCountry3 ? "selected" : "";
        let li = `<li onclick="updateName3(this)" class="${isSelected}">${country3}</li>`;
        options3.insertAdjacentHTML("beforeend", li);
    });
}
addCountry3();


function updateName3(selectedLi) {
  searchInp3.value = "";
  addCountry3(selectedLi.innerText);
  wrapper3.classList.remove("active");
  selectBtn3.firstElementChild.innerText = selectedLi.innerText;
}


searchInp3.addEventListener("keyup", () => {
    let arr = [];
    let searchWord = searchInp3.value.toLowerCase();
    arr = countriee.filter(data => {
        return data.toLowerCase().startsWith(searchWord);
    }).map(data => {
        let isSelected = data == selectBtn3.firstElementChild.innerText ? "selected" : "";
        return `<li onclick="updateName3(this)" class="${isSelected}">${data}</li>`;
    }).join("");
    options3.innerHTML = arr ? arr : `<p style="margin-top: 10px;">Oops! site not found</p>`;
});

selectBtn3.addEventListener("click", () => wrapper3.classList.toggle("active")); 
/*----------------------------------------------------------------------------------*/
            const wrapper2 = document.querySelector(".wrapper1"),
            selectBtn2 = wrapper2.querySelector(".select-btn1"),
            searchInp2 = wrapper2.querySelector("input"),
            options2 = wrapper2.querySelector(".options1");

let countrie = ["sport", "politique", "societe"];

function addCountry2(selectedCountry2) {
    options2.innerHTML = "";
    countrie.forEach(country2 => {
        let isSelected = country2 == selectedCountry2 ? "selected" : "";
        let li = `<li onclick="updateName2(this)" class="${isSelected}">${country2}</li>`;
        options2.insertAdjacentHTML("beforeend", li);
    });
}
addCountry2();

function updateName2(selectedLi) {
    searchInp2.value = "";
    addCountry2(selectedLi.innerText);
    wrapper2.classList.remove("active");
    selectBtn2.firstElementChild.innerText = selectedLi.innerText;
   
}

searchInp2.addEventListener("keyup", () => {
    let arr = [];
    let searchWord = searchInp2.value.toLowerCase();
    arr = countrie.filter(data => {
        return data.toLowerCase().startsWith(searchWord);
    }).map(data => {
        let isSelected = data == selectBtn2.firstElementChild.innerText ? "selected" : "";
        return `<li onclick="updateName2(this)" class="${isSelected}">${data}</li>`;
    }).join("");
    options2.innerHTML = arr ? arr : `<p style="margin-top: 10px;">Oops! Category not found</p>`;
});

selectBtn2.addEventListener("click", () => wrapper2.classList.toggle("active")); 
/*----------------------------------------------------------------------------------*/

const wrapper = document.querySelector(".wrapper"),
        selectBtn = wrapper.querySelector(".select-btn"),
        searchInp = wrapper.querySelector("input"),
        options = wrapper.querySelector(".options");
  let countries = ["Arabic", "French", "English"];

  function addCountry(selectedCountry) {
    options.innerHTML = "";
    countries.forEach(country => {
        let isSelected = country == selectedCountry ? "selected" : "";
        let li = `<li onclick="updateName(this)" class="${isSelected}">${country}</li>`;
        options.insertAdjacentHTML("beforeend", li);
    });
  }
  addCountry();

  function updateName(selectedLi) {
    searchInp.value = "";
    addCountry(selectedLi.innerText);
    wrapper.classList.remove("active");
    selectBtn.firstElementChild.innerText = selectedLi.innerText;
    
    const wrapper2 = document.querySelector(".wrapper2"),
    selectBtn2 = wrapper2.querySelector(".select-btn2"),
    options2 = wrapper2.querySelector(".options2");
    
    options2.innerHTML = "";
    
    if (selectedLi.innerText === "Arabic") {
      selectBtn2.firstElementChild.innerText = "Al3ome9";
      options2.innerHTML = `<li onclick="updateSite(this)" class="selected">Al3ome9</li>`;
    } else if (selectedLi.innerText === "French") {
      selectBtn2.firstElementChild.innerText = "24h";
      options2.innerHTML = `<li onclick="updateSite(this)" class="selected">24h</li>
                            <li onclick="updateSite(this)">Today</li>
                            <li onclick="updateSite(this)">site3</li>`;
    } else if (selectedLi.innerText === "English") {
      selectBtn2.firstElementChild.innerText = "Hespress";
      options2.innerHTML = `<li onclick="updateSite(this)" class="selected">Hespress</li>`;
    }

  }

  function updateSite(selectedSite) {
  const wrapper2 = document.querySelector(".wrapper2"),
  selectBtn2 = wrapper2.querySelector(".select-btn2");
  
  selectBtn2.firstElementChild.innerText = selectedSite.innerText;
  selectBtn2.firstElementChild.innerText = selectedSite.innerText;
  wrapper2.classList.remove("active");
}

  searchInp.addEventListener("keyup", () => {
    let arr = [];
    let searchWord = searchInp.value.toLowerCase();
    arr = countries.filter(data => {
        return data.toLowerCase().startsWith(searchWord);
    }).map(data => {
        let isSelected = data == selectBtn.firstElementChild.innerText ? "selected" : "";
        return `<li onclick="updateName(this)" class="${isSelected}">${data}</li>`;
    }).join("");
    options.innerHTML = arr ? arr : `<p style="margin-top: 10px;">Oops! No results found...</p>`;
  });

  selectBtn.addEventListener("click", () => {
    wrapper.classList.toggle("active");
  });


    
          </script>

    </body>
</html>