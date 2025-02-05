#!/usr/bin/php
<?php

/**
 *get options from user, check all inputs and create the command accordingly
 *and execute the command
 */
function get_options()
{

    $options = getopt('a:e:t:d:s:m:');
    $command = 'git log --format="%H - %an - %aD - %s"';

    if (!empty($options)) {
        if (array_key_exists('a', $options)) {
            $command .= ' --author=' . $options['a'];
        }
        if (array_key_exists('e', $options)) {
            $command .= ' --author=' . $options['e'];
        }
        if (array_key_exists('d', $options)) {
            $date = new DateTime($options['d']);
            $command .= ' --since=\'' . $date->format('m-d-Y H:i') .
                '\' --until=\'' . $date->format('m-d-Y 23:59') . '\'';
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
