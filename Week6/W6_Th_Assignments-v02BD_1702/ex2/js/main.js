

document.getElementById("add_button").addEventListener("click", function(){
    removePreviousItems();

    let add_text = getReferenceValue("add_title");
    let add_description = getReferenceValue("add_description");

    addToLocalStorage(add_text, add_description);

    getItems();
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

getItems();

