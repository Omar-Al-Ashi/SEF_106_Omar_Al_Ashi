<?php

// function that returns all the files given a directory recursively
function listFolderFiles($dir)
{
    // gets the content of the directory
    $content_of_directory = scandir($dir);

    // remove the . and .. files from the content_of_directory
    unset($content_of_directory[array_search('.', $content_of_directory)]);
    unset($content_of_directory[array_search('..', $content_of_directory)]);

    // prevent empty ordered elements
    if (count($content_of_directory) < 1)
        return;

    // loop over the content in content_of_directory for files and directories
    foreach ($content_of_directory as $content) {
        if (is_dir($dir . '/' . $content)) listFolderFiles($dir . '/' . $content);
        else echo $content, "\n";

    }
}

//get the parameter the user input
$parameter = $argv[1];
echo "Files within ", $parameter, ":\n";

listFolderFiles($parameter);

?>
