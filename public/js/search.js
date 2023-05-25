//searchbar script
/*----------------------------------------------------------------------------------------------------------------*/
let inputBox = document.querySelector(".input-box"),
searchIcon = document.querySelector(".icon"),
closeIcon = document.querySelector(".close-icon");

searchIcon.addEventListener("click", () => inputBox.classList.add("open"));
closeIcon.addEventListener("click", () => inputBox.classList.remove("open"));
/*----------------------------------------------------------------------------------------------------------------*/





//sites script
/*----------------------------------------------------------------------------------------------------------------*/
const wrapper3 = document.querySelector(".wrapper2"),
selectBtn3 = wrapper3.querySelector(".select-btn2"),
searchInp3 = wrapper3.querySelector("input"),
options3 = wrapper3.querySelector(".options2");

//checkbox
let allSitesCheckbox = document.getElementById('all-sites');
let siteCheckboxes = document.querySelectorAll('input[name="sites[]"]');

allSitesCheckbox.addEventListener('change', (e) => {
siteCheckboxes.forEach((checkbox) => {
checkbox.checked = e.target.checked;
});
});

siteCheckboxes.forEach((checkbox) => {
checkbox.addEventListener('change', (e) => {
if (!e.target.checked) {
allSitesCheckbox.checked = false;
}
});
});
//checkbox
function myFunction() {
  let CheckedLangue=document.querySelectorAll('input[name="language"]');
  console.log(CheckedLangue.length);
  let isChecked=false;
  CheckedLangue.forEach((langue) => {
    if(langue.checked){
      wrapper3.classList.toggle("active");
      return false;
    } 
    });
    let allSitesCheckbox = document.getElementById('all-sites');
let siteCheckboxes = document.querySelectorAll('input[name="sites[]"]');

allSitesCheckbox.addEventListener('change', (e) => {
siteCheckboxes.forEach((checkbox) => {
checkbox.checked = e.target.checked;
});
});

siteCheckboxes.forEach((checkbox) => {
checkbox.addEventListener('change', (e) => {
if (!e.target.checked) {
allSitesCheckbox.checked = false;
}
});
});
}
selectBtn3.addEventListener("click", myFunction); 
/*----------------------------------------------------------------------------------------------------------------*/



//categories script
/*----------------------------------------------------------------------------------------------------------------*/
const wrapper2 = document.querySelector(".wrapper1"),
selectBtn2 = wrapper2.querySelector(".select-btn1"),
searchInp2 = wrapper2.querySelector("input"),
options2 = wrapper2.querySelector(".options1");

// get the form element containing the category dropdown
const selectcategory = document.querySelector('.divs');

// get the span element inside the select-btn
const span = selectBtn2.querySelector('span');

// get the ul element inside the options
const ul = options2;

// get all the li elements inside the ul
const li = ul.querySelectorAll('li');

// loop through each li element
li.forEach((el) => {
// add a click event listener to each li element
el.addEventListener('click', () => {
// set the span text to the selected li text
span.textContent = el.textContent;
});
});

//checkbox
const allCategoriesCheckbox = document.getElementById('all-categories');
const categoryCheckboxes = document.querySelectorAll('input[name="categories[]"]');

allCategoriesCheckbox.addEventListener('change', (e) => {
categoryCheckboxes.forEach((checkbox) => {
checkbox.checked = e.target.checked;
});
});

categoryCheckboxes.forEach((checkbox) => {
 checkbox.addEventListener('change', (e) => {
 if (!e.target.checked) {
allCategoriesCheckbox.checked = false;
}
});
});
//checkbox

selectBtn2.addEventListener("click", () => wrapper2.classList.toggle("active"));
/*----------------------------------------------------------------------------------------------------------------*/






//languages script
/*----------------------------------------------------------------------------------------------------------------*/
const wrapper = document.querySelector(".wrapper"),
selectBtn = wrapper.querySelector(".select-btn"),
searchInp = wrapper.querySelector("input"),
options = wrapper.querySelector(".options");

// get all select elements
const selects = document.querySelectorAll('.selects');

// loop through each select element
selects.forEach((select) => {
// get the span element inside the select-btn
const span = select.querySelector('.select-btn span');

// get the ul element inside the options
const ul = select.querySelector('.options');

// get all the li elements inside the ul
const li = ul.querySelectorAll('li');

// loop through each li element
li.forEach((el) => {
// add a click event listener to each li element
el.addEventListener('click', () => {
// set the span text to the selected li text
span.textContent = el.textContent;
});
});
});

selectBtn.addEventListener("click", () => {
wrapper.classList.toggle("active");
});

//to complete
/* let Langues=document.querySelectorAll('input[name="language"]');
Langues.forEach((langue) => {
  langue.addEventListener("click",(langue) =>{
    console.log('wtf');
    langue.checked=false;
  });
  }); */
/*----------------------------------------------------------------------------------------------------------------*/







//change sites based on language
/*----------------------------------------------------------------------------------------------------------------*/
const sitesSelect = document.getElementById("sites-select");
let data;


// fetch('http://127.0.0.1:8000/api/langue')
// .then((response)=>{ console.log(response); return response.json()})


// Define the available sites for each language
const languageSites = {
  Arabe: [],
  Français: [],
  Anglais: [],
};

axios.get('http://127.0.0.1:8000/api/sites').then(Response=>{
  let data = Response.data.filter(e => e.id_langue === 1).map(e => e.News_name);;
  languageSites.Arabe.push(...data);
});
axios.get('http://127.0.0.1:8000/api/sites').then(Response=>{
  let data = Response.data.filter(e => e.id_langue === 2).map(e => e.News_name);
  languageSites.Français.push(...data);
});
axios.get('http://127.0.0.1:8000/api/sites').then(Response=>{
  let data = Response.data.filter(e => e.id_langue === 3).map(e => e.News_name);
  languageSites.Anglais.push(...data);
});

console.log(languageSites);
/*
async function getNewsNames(lang) {
  try {
    const response = await fetch(`/search?language=${lang}`);
    if (!response.ok) {
      throw new Error('Error retrieving news names');
    }
    const data = await response.json();
    return data.map(entry => entry.News_name);
  } catch (error) {
    console.error(error);
    return [];
  }
}

// Usage
getNewsNames(1)
  .then(newsNames => {
    languageSites.Arabic = newsNames;
    return getNewsNames(2);
  })
  .then(newsNames => {
    languageSites.Français = newsNames;
    return getNewsNames(3);
  })
  .then(newsNames => {
    languageSites.Anglais = newsNames;
    console.log(languageSites);
  })
  .catch(error => {
    console.error('Error:', error);
  });
  document.querySelector(".options").addEventListener("change", async (event) => {
    const selectedLanguage = event.target.value;
  const availableNews = await getNewsNames(selectedLanguage);

  const sitesSelect = document.getElementById("sites-select");
  const optionsList = sitesSelect.querySelector(".options2");

  // Clear existing options
  optionsList.innerHTML = "";

  // Add new options
  availableNews.forEach((news) => {
    const li = document.createElement("li");
    li.innerHTML = `
      <input type="checkbox" id="${news}" name="news[]" value="${news}">
      <label for="${news}">${news}</label>`;
    optionsList.appendChild(li);
    });
  });
  */
// Update the available sites when the language is changed
document.querySelector(".options").addEventListener("change", (_event) => {
  const selectedLanguage = document.querySelector('input[name="language"]:checked').value;
  const availableSites = languageSites[selectedLanguage] ;
  sitesSelect.querySelector(".options2").innerHTML = "<li><input type='checkbox' id='all-sites' name='all-sites' value='all-sites'> <label for='all-sites' id='all-sites-label'><b>All Sites</b></label></li>";
  availableSites.forEach((site) => {
    const li = document.createElement("li");
    li.innerHTML = `<input class="sites" type="checkbox" id="${site}" name="sites[]" value="${site}"><label for="${site}">${site}</label>`;
    sitesSelect.querySelector(".options2").appendChild(li);
  });
});



/*  let all_sites=document.getElementById('all-sites');
 all_sites.addEventListener("click", (event) => {
  console.log(event.target.checked);
  let sites=document.querySelectorAll('.sites');
  console.log(sites.length);
  console.log('here2');
  sites.forEach((site)=>{
    site.checked = !site.checked;
  });
  }); */
/*----------------------------------------------------------------------------------------------------------------*/






//close the wrapper when the user clicks anywhere else
/*----------------------------------------------------------------------------------------------------------------*/
//for the langauge
const selectWrappers = document.querySelectorAll(".wrapper");
document.addEventListener("click", (event) => {
let isInsideSelectWrapper = false;
for (let i = 0; i < selectWrappers.length; i++) {
if (selectWrappers[i].contains(event.target)) {
isInsideSelectWrapper = true;
break;
}
}
if (!isInsideSelectWrapper) {
for (let i = 0; i < selectWrappers.length; i++) {
selectWrappers[i].classList.remove("active");
}
}
});

//for the category
const selectWrapper1 = document.querySelectorAll(".wrapper1");
document.addEventListener("click", (event) => {
let isInsideSelectWrapper = false;
for (let i = 0; i < selectWrapper1.length; i++) {
if (selectWrapper1[i].contains(event.target)) {
isInsideSelectWrapper = true;
break;
}
}
if (!isInsideSelectWrapper) {
for (let i = 0; i < selectWrapper1.length; i++) {
selectWrapper1[i].classList.remove("active");
}
}
});



//for the sites
const selectWrapper2 = document.querySelectorAll(".wrapper2");
document.addEventListener("click", (event) => {
let isInsideSelectWrapper = false;
for (let i = 0; i < selectWrapper2.length; i++) {
if (selectWrapper2[i].contains(event.target)) {
isInsideSelectWrapper = true;
break;
}
}
if (!isInsideSelectWrapper) {
for (let i = 0; i < selectWrapper2.length; i++) {
selectWrapper2[i].classList.remove("active");
}
}
});
/*----------------------------------------------------------------------------------------------------------------*/





//search box for the selects
/*----------------------------------------------------------------------------------------------------------------*/
//for language
const searchBox = document.querySelector("#language-search");
const languageList = document.querySelectorAll(".options li");

searchBox.addEventListener("keyup", function(event) {
const searchTerm = event.target.value.toLowerCase();
languageList.forEach(function(language) {
const text = language.textContent.toLowerCase();
const match = text.includes(searchTerm);
language.style.display = match ? "block" : "none";
});
});


//for sites
const searchInput = document.getElementById('site-search');
const optionsList = document.querySelectorAll('#sites-select .options2 li');

searchInput.addEventListener('input', () => {
const searchTerm = searchInput.value.toLowerCase();

optionsList.forEach((option) => {
const label = option.querySelector('label').textContent.toLowerCase();
if (label.includes(searchTerm)) {
option.style.display = '';
} else {
option.style.display = 'none';
}
});
});


//for category
const searchBox2 = document.querySelector("#category-search");
const categorylist = document.querySelectorAll(".options1 li");

searchBox2.addEventListener("keyup", function(event) {
const searchTerm = event.target.value.toLowerCase();
categorylist.forEach(function(category) {
const text = category.textContent.toLowerCase();
const match = text.includes(searchTerm);
category.style.display = match ? "block" : "none";
});
});
/*----------------------------------------------------------------------------------------------------------------*/



// change the name of the span in language section
/*----------------------------------------------------------------------------------------------------------------*/
const languageRadioButtons = document.querySelectorAll('input[name="language"]');
const languageSelectText = document.querySelector('.select-btn span');

languageRadioButtons.forEach((button) => {
  button.addEventListener('change', () => {
    const selectedLanguage = document.querySelector('input[name="language"]:checked').value;
    languageSelectText.textContent = selectedLanguage.toUpperCase();
  });
});
/*----------------------------------------------------------------------------------------------------------------*/
const Langue=(e)=>{console.log(e)}
console.log('test')