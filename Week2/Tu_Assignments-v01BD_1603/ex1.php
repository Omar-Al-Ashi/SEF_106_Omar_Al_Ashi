#!/usr/bin/php
<?php

/**
 * adds to the search the specific options the user input
 * @param $options
 */
function search_for($options)
{
    $search = 'Search result by ';
    foreach ($options as $key) {
        switch ($key) {
            case 'a':
                $search .= "Author (\"$options[$key]\"), ";
                break;
            case 'e':
                $search .= "Email address(\"$options[$key]\"), ";
                break;
            case 't':
                $search .= "Time (\"$options[$key]\"), ";
                break;
            case 'd':
                $search .= "Date (\"$options[$key]\"), ";
                break;
            case 's':
                $search .= "Epoch timestamp (\"$options[$key]\"), ";
                break;
            case 'm':
                $search .= "Commit message (\"$options[$key]\"), ";
                break;
        }
    }
    print("$search") . PHP_EOL;
}

/**
 *get options from user, check all inputs and create the command accordingly
 *and execute the command
 */
function get_options()
{


    $options = getopt('a:e:t:d:s:m:');
    $command = 'git log --format="%H - %an - %aD - %s"';

    if (!empty($options)) {
        search_for($options);
        if (array_key_exists('a', $options)) {
            $command .= ' --author=' . $options['a'];
        }
        if (array_key_exists('e', $options)) {
            $command .= ' --author=' . $options['e'];
        }
        if (array_key_exists('d', $options)) {
            $date = new DateTime($options['d']);
            $command .= ' --since=\'' . $date->format('m-d-Y H:i') . '\' --until=\''
                . $date->format('m-d-Y 23:59') . '\'';
        }
        if (array_key_exists('s', $options)) {
            $command .= ' --since=' . $options['s'] . ' --until=' . $options['s'];
        }
        if (array_key_exists('m', $options)) {
            $command .= ' --grep=' . $options['m'];
        }

        $output = shell_exec($command);
        $output = explode("\n", $output);
        $n = 0;
        foreach ($output as $line) {
            if ($line != '') {
                echo ++$n . ':: ' . $line . PHP_EOL;
            }
        }
    } else {
        echo "Options are incorrect" . PHP_EOL;
    }
}

get_options();

?>