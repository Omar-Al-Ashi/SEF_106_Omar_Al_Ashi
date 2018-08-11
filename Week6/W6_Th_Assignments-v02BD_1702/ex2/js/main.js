

document.getElementById("add_button").addEventListener("click", function(){
    removePreviousItems();

    let add_text = getReferenceValue("add_title");
    let add_description = getReferenceValue("add_description");

    addToLocalStorage(add_text, add_description);

    getItems();
    mapListToHtml();
});


function getReferenceValue(element_id){
    return document.getElementById(element_id).value;
}

function addToLocalStorage(key, value) {
    localStorage.setItem(key, value)
}

function removePreviousItems() {
    let paras = document.getElementsByClassName('list');

    while(paras[0]) {
        paras[0].parentNode.removeChild(paras[0]);
    }
}

function getItems() {
    let length = localStorage.length;
    for (let i = 0; i < length; i++) {
        addText(localStorage.key(i));
    }
}

function addText(text) {

    var paragraph = document.createElement("p");
    var t = document.createTextNode(text);
    paragraph.appendChild(t);
    paragraph.classList.add("list");
    document.body.appendChild(paragraph);
}

function mapListToHtml() {
    let length = localStorage.length;
    for (let i = 0; i<length ; i++){
    //    TODO create the divs accordingly
        let items_container = document.getElementById("items_container"); //parent

        let list_item_container = document.createElement("div");
        list_item_container.classList.add("list_item_container");

        let item_text= document.createElement("div");
        item_text.classList.add("item_text");

        let item_title = document.createElement("div");
        item_title.classList.add("item_title");
        item_title.classList.add("bold");
        item_title.innerHTML = "<p class='todo_title'>" + localStorage.key(i) + "</p>";

        let item_time_added = document.createElement("div");
        item_time_added.classList.add("item_time_added");
        item_time_added.innerHTML = "<p class='todo_date'>" + "no idea how to het the date" + "</p>";

        let item_description = document.createElement("div");
        item_description.classList.add("item_description");
        item_description.innerHTML= "<p class='todo_date'>" + localStorage.getItem(localStorage.key(i)) + "</p>";

        let delete_container = document.createElement("div");
        delete_container.classList.add("delete_container");
        let delete_button= document.createElement("button");
        delete_button.classList.add("button");
        delete_button.classList.add("delete_button");
        delete_button.innerText = "X";

        // parent.appendChild(child);
        items_container.appendChild(list_item_container);
        list_item_container.appendChild(item_text);
        list_item_container.appendChild(delete_container);
        delete_container.appendChild(delete_button);
        item_text.appendChild(item_title);
        item_text.appendChild(item_time_added);
        item_text.appendChild(item_description);


        document.getElementById("items_container").appendChild(list_item_container);



        // list_item_contianer.appendChild(items_container);
        // list_item_contianer.style.backgroundColor = "blue";
        // document.body.appendChild(items_container);

    }
}

