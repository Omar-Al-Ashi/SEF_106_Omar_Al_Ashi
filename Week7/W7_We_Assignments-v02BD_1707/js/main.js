var Summarizer = {
    uiElements: {
        urlInput: document.getElementById("url_input"),
        submitButton: document.getElementById("btn_submit"),
    },
    url: "https://cors.io/?https://medium.freecodecamp.org/the-art-of-computer-programming-by-donald-knuth-82e275c8764f",

    /*
    * Initializer
    */
    init: function () {
        let that = this;
        this.uiElements.submitButton.addEventListener("click", function () {
            let document_data = that.loadDoc(that.getURLInputValue());
            that.writeToFile("./text.html",that.searchForParagraphs(document_data));
        });
    },

    /*
    * get the source code of a specific url
    */
    loadDoc: function (url) {
        var xhttp;
        let html;
        if (window.XMLHttpRequest) {
            // code for modern browsers
            xhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                // TODO change the console log
                console.log(html = this.responseText);
                return this.responseText;
            }
        };
        xhttp.open("GET", url, true);
        xhttp.send();
    },

    /*
    * get the input from the url ui element and prepend to it the proxy
    */
    getURLInputValue: function () {
        let url = Summarizer.uiElements.urlInput.value;
        let url_with_proxy = this.addProxy(url);
        return url_with_proxy;
    },

    /*
    * return a proxy
    */
    addProxy: function (url) {
        return "https://cors.io/?" + url;
    },

    /*
    * search for a <p> tag in a text
    */
    searchForParagraphs: function (text) {
        // this regex will get all the items inside <p>
        let myRe = /<\s*p[^>]*>([^<]*)<\s*\/\s*p\s*>/;
        return myArray = myRe.exec(text);
        // return text.search(/<\s*p[^>]*>([^<]*)<\s*\/\s*p\s*>/);
    },
    
    writeToFile: function writeTextFile(filepath, output) {
        var txtFile = new File(filepath);
        txtFile.open("w"); //
        txtFile.writeln(output);
        txtFile.close();
    }
};