<?php
require_once ("config.php");
require_once("../vendor/autoload.php");
$summerized_sentences = array();
$config = new config();
$textapi = new AYLIEN\TextAPI($config->config['application_id'], $config->config['application_key']);


function getSummary(){

// Check if we have parameters w1 and w2 being passed to the script through the URL
    if (isset($_GET["t1"])) {

        $paragraphs = $_GET["t1"];

        echo $paragraphs;

        $summary = $this->textapi->Summarize(array('text' => $this->small_paragraph, 'sentences_number' => 3));
        foreach ($summary->sentences as $sentece) {
            array_push($summerized_sentences, $sentece);
            echo $sentece, "\n";
        }
    }
}

getSummary();
