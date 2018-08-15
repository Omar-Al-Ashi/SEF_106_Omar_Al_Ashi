<?php
require_once("../vendor/autoload.php");
$application_id = "cd738921";
$application_key = "826c40d0433beebc1d1988c4e36edeef";
$textapi = new AYLIEN\TextAPI($application_id, $application_key);

$summerized_sentences = array();


function getSummery(){

// Check if we have parameters w1 and w2 being passed to the script through the URL
    if (isset($_GET["t1"])) {

        $paragraphs = $_GET["t1"];

        $summary = $this->textapi->Summarize(array('text' => $this->small_paragraph, 'sentences_number' => 3));
        foreach ($summary->sentences as $sentece) {
            array_push($summerized_sentences, $sentece);
            echo $sentece, "\n";
        }
    }
}
//
//echo "<script language='text/javascript'>function saveToSummerizedSentences() { ; }</script>";
