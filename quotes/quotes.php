<?php
$randNum = rand(0,6);
$quotes = json_decode(file_get_contents("quotes.json"));
echo $quotes[$randNum];
?>