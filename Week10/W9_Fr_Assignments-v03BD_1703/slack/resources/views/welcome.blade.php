<!doctype html>
<html>
<head>
    <title>Simple Chat</title>
    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style>
        html, body {
            font: normal 0.9em arial, helvetica;
        }

        #log {
            width: 440px;
            height: 200px;
            border: 1px solid #7F9DB9;
            overflow: auto;
        }

        #msg {
            width: 330px;
        }

        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

    </style>

    <script>
        var socket;


        function createSocket(host) {

            if ('WebSocket' in window)
                return new WebSocket(host);
            else if ('MozWebSocket' in window)
                return new MozWebSocket(host);

            throw new Error("No web socket support in browser!");
        }

        function init() {
            var host = "ws://localhost:12345/chat";
            try {
                socket = createSocket(host);
                log('WebSocket - status ' + socket.readyState);
                socket.onopen = function (msg) {
                    log("Welcome - status " + this.readyState);
                };
                socket.onmessage = function (msg) {
                    log(msg.data);
                };
                socket.onclose = function (msg) {
                    log("Disconnected - status " + this.readyState);
                };
            }
            catch (ex) {
                log(ex);
            }
            document.getElementById("msg").focus();
        }

        function send() {
            var msg = document.getElementById('msg').value;

            try {
                socket.send(msg);
            } catch (ex) {
                log(ex);
            }
        }

        function quit() {
            log("Goodbye!");
            socket.close();
            socket = null;
        }

        function log(msg) {
            document.getElementById("log").innerHTML += "<br>" + msg;
        }

        function onkey(event) {
            if (event.keyCode == 13) {
                send();
            }
        }
    </script>

</head>
<body onload="init()">

<div class="flex-center position-ref well">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            @endauth
        </div>
    @endif

</div>
<div class="well">
    <h3>WebSocket Test</h3>
    <div id="log" class="form-control"></div>
    <label>Message <input id="msg" type="text"
                          onkeypress="onkey(event)" placeholder="message"/></label>
    <button onclick="send()">Send</button>
    <button onclick="quit()">Quit</button>
    <div>Server will echo your response!</div>
</div>
</body>
</html>
