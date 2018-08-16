<?php
require_once("config.php");
require_once("../vendor/autoload.php");
$summerized_sentences = array();
$config = new config();
$textapi = new AYLIEN\TextAPI($config->config['application_id'], $config->config['application_key']);


/**
 * function that creates an API request to Aylien and returns the summarized
 * paragraphs
 * @param $textapi
 * @param $summerized_sentences
 */
function getSummary($textapi, $summerized_sentences)
{

// Check if we have parameters w1 and w2 being passed to the script through the URL
    if (isset($_GET["t1"])) {

        $paragraphs = $_GET["t1"];
        $number_of_sentences = $_GET["t2"];

//        echo $paragraphs;

        $summary = $textapi->Summarize(array('title' => "title",
            'text' => $paragraphs, 'sentences_number' => $number_of_sentences));
        foreach ($summary->sentences as $sentece) {
            array_push($summerized_sentences, $sentece);
            print($sentece) . PHP_EOL;
        }
    }
}

getSummary($textapi, $summerized_sentences);
