var date = new Date();

//when the DOM is fully loaded
document.addEventListener("DOMContentLoaded", function () {
    mapListToHtml();
});

//when the add button is clicked
document.getElementById("add_button").addEventListener("click", function () {
    removePreviousItems();
    let add_text = getReferenceValue("add_title");
    let add_description = getReferenceValue("add_description");

    if (add_text.replace(/\s/g, '').length > 0 && add_description.replace(/\s/g, '').length > 0) {
        addToLocalStorage(add_text, add_description);
    }

    mapListToHtml();
});

//remove an element from the local storage
function removeItemById(id) {
    localStorage.removeItem(id);
    removePreviousItems();
    mapListToHtml();
}

//get the value of an input
function getReferenceValue(element_id) {
    return document.getElementById(element_id).value;
}

//returns full date in a specific format
function getFullDate() {
    date = new Date();
    let day_name = getDayName();
    let month_name = getMonthName();
    let day = getDay();
    let year = getYear();
    let hours = getHours();
    let minutes = getMinutes();

    return day_name + ", " + month_name + " " + day + " " + year + " " + hours + ":" + minutes;

}

//get day name
function getDayName() {
    let weekday = new Array(7);
    weekday[0] = "Sunday";
    weekday[1] = "Monday";
    weekday[2] = "Tuesday";
    weekday[3] = "Wednesday";
    weekday[4] = "Thursday";
    weekday[5] = "Friday";
    weekday[6] = "Saturday";

    return weekday[date.getDay()];
}

//get day number
function getDay() {
    return date.getDate();
}

//get month name
function getMonthName() {
    const monthNames = ["January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"
    ];

    return monthNames[date.getMonth()];
}

//get year
function getYear() {
    return date.getFullYear()
}

//get hours
function getHours() {
    return date.getHours();
}

//get minutes
function getMinutes() {
    return date.getMinutes();
}

//add a key and value to the local storage
function addToLocalStorage(key, value) {
    let date = getFullDate();
    let value_and_date = [value, date];

    localStorage.setItem(key, JSON.stringify(value_and_date))
}

//erase the previous items from the screen
function removePreviousItems() {
    let paras = document.getElementsByClassName('list_item_container');

    while (paras[0]) {
        paras[0].parentNode.removeChild(paras[0]);
    }
}

//create the html to be filled with data from the local storage
function mapListToHtml() {
    let length = localStorage.length;
    for (let i = 0; i < length; i++) {
        let items_container = document.getElementById("items_container"); //parent

        let description_and_date = JSON.parse(localStorage.getItem(localStorage.key(i)));

        let list_item_container = document.createElement("div");
        list_item_container.classList.add("list_item_container");

        let item_text = document.createElement("div");
        item_text.classList.add("item_text");

        let item_title = document.createElement("div");
        item_title.classList.add("item_title");
        item_title.classList.add("bold");
        item_title.innerHTML = "<p class='todo_title'>" + localStorage.key(i) + "</p>";

        let item_time_added = document.createElement("div");
        item_time_added.classList.add("item_time_added");
        item_time_added.innerHTML = "<p class='todo_date'>" + description_and_date[1] + "</p>";

        let item_description = document.createElement("div");
        item_description.classList.add("item_description");
        item_description.classList.add("bold");
        item_description.innerHTML = "<p class='todo_description'>" + description_and_date[0] + "</p>";

        let delete_container = document.createElement("div");
        delete_container.classList.add("delete_container");
        let delete_button = document.createElement("button");
        delete_button.classList.add("button");
        delete_button.classList.add("delete_button");
        delete_button.setAttribute("id", localStorage.key(i));
        delete_button.innerText = "X";
        // delete_button.setAttribute.onclick = function() { removeItemById(localStorage.key(1)) };
        delete_button.setAttribute('onclick', "removeItemById('" + localStorage.key(i) + "')");


        // parent.appendChild(child);
        items_container.appendChild(list_item_container);
        list_item_container.appendChild(item_text);
        list_item_container.appendChild(delete_container);
        delete_container.appendChild(delete_button);
        item_text.appendChild(item_title);
        item_text.appendChild(item_time_added);
        item_text.appendChild(item_description);


        document.getElementById("items_container").appendChild(list_item_container);
    }
}
