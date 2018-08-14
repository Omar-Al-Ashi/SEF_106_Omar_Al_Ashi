var Summarizer = {
    uiElements: {
        urlInput: document.getElementById("url_input"),
        submitButton: document.getElementById("btn_submit"),
    },
    url: "https://cors.io/?https://medium.freecodecamp.org/the-art-of-computer-programming-by-donald-knuth-82e275c8764f",
    // html_text contains the source code of the web page
    html_text: "",
    // paragraphs contains the Ps in the text
    paragraphs: [],

    /*
    * Initializer
    */
    init: function () {
        let that = this;
        this.uiElements.submitButton.addEventListener("click", function () {
            that.loadDoc(that.getURLInputValue());

            //TODO remove the timeout and chain the two methods
            setTimeout(function afterSevenSeconds() {
                // console.log(Summarizer.html_text);
                that.getParagraphs();
                // document.write(that.paragraphs)
                that.sendToPHP();
            }, 10000);

        });
    },

    /*
    * get the source code of a specific url
    */
    loadDoc: function (url) {
        var xhttp;
        if (window.XMLHttpRequest) {
            // code for modern browsers
            xhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                Summarizer.html_text = this.responseText;
            }
        };
        xhttp.open("GET", url, true);
        xhttp.send();
        return this;
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
    * returns all the elements that have the class "graf--p"
    */
    getParagraphs: function () {
        let el = document.createElement('html');
        el.innerHTML = this.html_text;
        let whatever = (el.getElementsByClassName('graf--p'));

        for (let i = 0; i < whatever.length; i++) {
            this.paragraphs[i] = whatever[i].textContent;
        }
    },

    sendToPHP: function () {
        let text_to_be_sent = this.paragraphs;

        // window.location.href = "./php/main.php?t1=" + text_to_be_sent;
        window.location.href = "whatever.html?t1=" + text_to_be_sent;
    }
};