<?php

    // Check if we have parameters w1 and w2 being passed to the script through the URL
    if (isset($_GET["t1"])) {

        // Put the two words together with a space in the middle to form "hello world"
        $hello = $_GET["t1"];

        // Print out some JavaScript with $hello stuck in there which will put "hello world" into the javascript.
        echo $hello;
    }