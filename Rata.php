<?php

function getClassId($name){
$spreadsheet_url = "https://docs.google.com/spreadsheets/d/16VuEAAc0rw78VM6qfdiCpnB79NxYle2UH5BKDJfL594/pub?output=csv";

date_default_timezone_set('america/los_angeles');

if(!ini_set('default_socket_timeout',    15)) echo "<!-- unable to change socket timeout -->";

if (($handle = fopen($spreadsheet_url, "r")) !== false) {
$spreadsheet_data = null;
    while (($data = fgetcsv($handle, 1000, ",")) !== false) {
            $spreadsheet_data[]=$data;
	
        }
    fclose($handle);
    }else{
	echo "Broken";
}

	//Above code reads data into "$spreadsheet_data" <- 2d Array


	for( $i = 1; $i < 6; $i++) { 

	if(date("Hi", time()) > $spreadsheet_data[$i][1] && date("Hi", time()) < $spreadsheet_data[$i][2]) {

		if(strcmp($spreadsheet_data[$i][4], $name) == 0){
		return $spreadsheet_data[$i][0];
}
	}

	}
	return 'none';  
}
	

?>
