const searchWrapper = document.querySelector(".search-input");
const inputBox = document.querySelector(".custSelector");
const suggestionsBox = document.querySelector(".cust-suggest-box");

const custDetailsBox = document.querySelector(".profile-info");
const custNameBox = document.querySelector(".profile-info .cust-name");
const custMobNo = document.querySelector(".profile-info .contact-no");
const custRemoveBtn = document.querySelector(".profile-remove");

getCustomersList();

let suggestions = [
    ["Devin Dissanayake", "0717679714"],
    ["Kasun Mendis", "0767679714"],
    ["KBaFsun Mendis", "0717679714"],
    ["Kasuinisfs Mendis", "0767679714"],
    ["Ashan Hansaka", "0787679714"]
];

inputBox.onkeyup = (e) => {
    let custData = e.target.value;
    let filteredCustList = [];

    // if smth is typed
    if (custData) {

        // filter suggestion to a list
        filteredCustList = suggestions.filter((data) => {
            let c1 = data[0].toLocaleLowerCase().startsWith(custData.toLocaleLowerCase());
            let c2 = data[1].startsWith(custData);
            return c1 || c2;
        });

        // map each suggestion to an element
        filteredCustList = filteredCustList.map((customer) => {
            customer = `<li data-name = "${customer[0]}" data-mobno= "${customer[1]}" onclick="addThis(this)">${customer[0]} ${customer[1]}</li>`
            return customer;
        })

        showSuggestions(filteredCustList);
    } else {
        suggestionsBox.style.display = "none";
    }

}

function showSuggestions(filteredCustList) {
    let listData;

    // if there are suggestion
    if (!filteredCustList.length) {
        suggestionsBox.style.display = "none";
    } else {
        suggestionsBox.style.display = "block";
        listData = filteredCustList.join(' ');
    }
    suggestionsBox.innerHTML = listData;
}

function addThis(option) {

    custDetailsBox.style.display = "flex";
    console.log(option);
    custNameBox.innerHTML = option.getAttribute("data-name");
    custMobNo.innerHTML = option.getAttribute("data-mobno");
    inputBox.value = "";
    suggestionsBox.style.display = "none";
}


async function getCustomersList() {
    await fetch(`http://localhost:80/beauty-craft/Customer/getAllActiveCustomers`)
        .then(response => response.json())
        .then(customers => {
            customers.forEach(customer => {
                let tempArray = [`${customer['fName']} ${customer['lName']}`, `${customer['mobileNo']}`]
                suggestions.push(tempArray);
            });
        });
}

function removeProfile() {
    custDetailsBox.style.display = "none";
}

function walkinToggle(toggle) {
    console.log(toggle);
    if (toggle.checked) {
        inputBox.value = "";
        inputBox.disabled = true;
        custDetailsBox.style.display = "none";
    } else {
        inputBox.disabled = false;

    }
}
