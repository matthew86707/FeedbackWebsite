<?php
$Url="https://docs.google.com/spreadsheets/d/16VuEAAc0rw78VM6qfdiCpnB79NxYle2UH5BKDJfL594/pub?output=csv";

if(!ini_set('default_socket_timeout',    15)) echo "<!-- unable to change socket timeout -->";

if (($handle = fopen($url, "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $spreadsheet_data[]=$data;
	print_r($data);
        }
    }
    fclose($handle);

?>