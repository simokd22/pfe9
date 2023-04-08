
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


/*function addCountry3(selectedCountry3) {
    options3.innerHTML = "";
    countriee.forEach(country3 => {
        let isChecked = country3 == selectedCountry3 ? "checked" : "";
        let label = `<label><input type="checkbox" ${isChecked}>${country3}</label>`;
        options3.insertAdjacentHTML("beforeend", label);
    });
}*/

function addCountry3(selectedCountry3) {
  options3.innerHTML = "";
  countriee.forEach(country3 => {
    let isChecked = country3 == selectedCountry3 ? "checked" : "";
    let label = `<label><input type="checkbox" ${isChecked}>${country3}</label>`;
    options3.insertAdjacentHTML("beforeend", label);
  });

  let checkboxes = options3.querySelectorAll("input[type='checkbox']");
  checkboxes.forEach(checkbox => {
    checkbox.addEventListener("change", () => {
      let selectedCountries = [];
      checkboxes.forEach(checkbox => {
        if (checkbox.checked) {
          selectedCountries.push(checkbox.nextSibling.textContent);
        }
      });
      selectBtn3.firstElementChild.innerText = selectedCountries.join(", ");
    });
  });
}

addCountry3();


function updateName3(selectedLi) {
  searchInp3.value = "";
  addCountry3(selectedLi.innerText);
  wrapper3.classList.remove("active");
  selectBtn3.firstElementChild.innerText = selectedLi.innerText;
}

document.addEventListener("click", function(event) {
  const isClickInsideContent2 = wrapper3.contains(event.target) || selectBtn3.contains(event.target);
  if (!isClickInsideContent2) {
    wrapper3.classList.remove("active");
  }
});


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

/*function addCountry2(selectedCountry2) {
    options2.innerHTML = "";
    countrie.forEach(country2 => {
        let isChecked = country2 == selectedCountry2 ? "checked" : "";
        let label = `<label><input type="checkbox" ${isChecked}>${country2}</label>`
        options2.insertAdjacentHTML("beforeend", label);
    });
}*/

function addCountry2(selectedCountry2) {
  options2.innerHTML = "";
  countrie.forEach(country2 => {
    let isChecked = country2 == selectedCountry2 ? "checked" : "";
    let label = `<label><input type="checkbox" ${isChecked}>${country2}</label>`;
    options2.insertAdjacentHTML("beforeend", label);
  });

  let checkboxes = options2.querySelectorAll("input[type='checkbox']");
  checkboxes.forEach(checkbox => {
    checkbox.addEventListener("change", () => {
      let selectedCountries2= [];
      checkboxes.forEach(checkbox => {
        if (checkbox.checked) {
          selectedCountries2.push(checkbox.nextSibling.textContent);
        }
      });
      selectBtn2.firstElementChild.innerText = selectedCountries2.join(", ");
    });
  });
}


addCountry2();

function updateName2(selectedLi) {
    searchInp2.value = "";
    addCountry2(selectedLi.innerText);
    wrapper2.classList.remove("active");
    selectBtn2.firstElementChild.innerText = selectedLi.innerText;
   
}

document.addEventListener("click", function(event) {
  const isClickInsideContent1 = wrapper2.contains(event.target) || selectBtn2.contains(event.target);
  if (!isClickInsideContent1) {
    wrapper2.classList.remove("active");
  }
});

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

  /*function addCountry(selectedCountry) {
    options.innerHTML = "";
    countries.forEach(country => {
        let isChecked = country == selectedCountry ? "checked" : "";
        let label = `<label><input type="checkbox" ${isChecked}>${country}</label>`;
        options.insertAdjacentHTML("beforeend", label);
    });
  }*/

  function addCountry(selectedCountry) {
  options.innerHTML = "";
  countries.forEach(country => {
    let isChecked = country == selectedCountry ? "checked" : "";
    let label = `<label><input type="checkbox" ${isChecked}>${country}</label>`;
    options.insertAdjacentHTML("beforeend", label);
  });

  let checkboxes = options.querySelectorAll("input[type='checkbox']");
  checkboxes.forEach(checkbox => {
    checkbox.addEventListener("change", () => {
      let selectedCountries= [];
      checkboxes.forEach(checkbox => {
        if (checkbox.checked) {
          selectedCountries.push(checkbox.nextSibling.textContent);
        }
      });
      selectBtn.firstElementChild.innerText = selectedCountries.join(", ");
    });
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

document.addEventListener("click", function(event) {
  const isClickInsideContent = wrapper.contains(event.target) || selectBtn.contains(event.target);
  if (!isClickInsideContent) {
    wrapper.classList.remove("active");
  }
});

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

