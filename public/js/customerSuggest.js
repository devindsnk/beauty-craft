const searchWrapper = document.querySelector(".search-input");
const inputBox = document.querySelector(".custSelector");
const suggestionsBox = document.querySelector(".cust-suggest-box");

const custDetailsBox = document.querySelector(".profile-info");
const custNameBox = document.querySelector(".profile-info .cust-name");
const custMobNo = document.querySelector(".profile-info .contact-no");
const custRemoveBtn = document.querySelector(".profile-remove");
const custImage = document.querySelector(".header-profilepic");

getCustomersList();

let suggestions = [
    // ["Devin Dissanayake", "0717679714", "000064", "imgPath"],
    // ["Kasun Mendis", "0767679714", "000064"],
    // ["KBaFsun Mendis", "0717679714", "000064"],
    // ["Kasuinisfs Mendis", "0767679714", "000064"],
    // ["Ashan Hansaka", "0787679714", "000064"]
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
            customer = `<li data-name = "${customer[0]}" data-mobno= "${customer[1]}" data-custid = "${customer[2]}" data-img = "${customer[3]}" onclick="addCustomer(this)">${customer[0]} ${customer[1]}</li>`
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

function addCustomer(option) {

    let custID = option.getAttribute("data-custid");

    custDetailsBox.style.display = "flex";
    custNameBox.innerHTML = option.getAttribute("data-name");
    custNameBox.setAttribute("data-custid", custID);
    custMobNo.innerHTML = option.getAttribute("data-mobno");
    inputBox.value = "";
    suggestionsBox.style.display = "none";

    let imgPath = option.getAttribute("data-img");
    if (imgPath != 'null')
        custImage.setAttribute("src", 'http://localhost/beauty-craft/public/imgs/customerImgs/' + option.getAttribute("data-img"));
    else {
        custImage.setAttribute("src", 'http://localhost/beauty-craft/public/imgs/customerImgs/male.jpg');
    }
    custError.innerHTML = "";
}


async function getCustomersList() {
    await fetch(`http://localhost:80/beauty-craft/Customer/getAllActiveCustomers`)
        .then(response => response.json())
        .then(customers => {
            customers.forEach(customer => {
                let tempArray = [`${customer['fName']} ${customer['lName']}`, `${customer['mobileNo']}`, `${customer['customerID']}`, `${customer['imgPath']}`]
                suggestions.push(tempArray);
            });
        });
}

function removeCustomer() {
    custDetailsBox.style.display = "none";
    custNameBox.setAttribute("data-custid", "");
    custNameBox.innerHTML = "";
    custMobNo.innerHTML = "";
}

function walkinToggleSwitch(toggle) {
    if (toggle.checked) {
        inputBox.value = "Walk-In";
        inputBox.disabled = true;
        removeCustomer();
        custError.innerHTML = "";
    } else {
        inputBox.disabled = false;
        inputBox.value = "";
    }
}
