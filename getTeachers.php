<?php

$spreadsheet_url = "https://docs.google.com/spreadsheets/d/1REN8XXjnovALoQdJ2eSueFbi7T_DxnS1sGn8qF3jUNE/pub?output=csv"; 

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

	//Below code sets up vars 
	
	$HOURS_AS_INT = 100;
	$HOUR_MIN_AS_INT = 60;
	$teachers = "";

	$currentTime = date("Hi", time());	
	$currentDay = date("w", time());


	for( $i = 1; $i < sizeof($spreadsheet_data); $i++) { 

	$startTime = 0;
	$endTime = 0;
	$dayWeek = 0;

	$rawText = $spreadsheet_data[$i][1];
	$parts = explode("@", $rawText);
	$weekText = $parts[0];
        $timeText = $parts[1];		
	//Check for days
	if(strpos($weekText, "sun") > -1){
	$dayWeek = 0;
}       
 
	if(strpos($weekText, "mon") > -1){
	$dayWeek = 1;
}       
 
	if(strpos($weekText, "tue") > -1){
	$dayWeek = 2;
}       
 
	if(strpos($weekText, "wed") > -1){
	$dayWeek = 3;
}        

	if(strpos($weekText, "thu") > -1){
	$dayWeek = 4;
}       
 
	if(strpos($weekText, "fri") > -1){
	$dayWeek = 5;
}       
 
	if(strpos($weekText, "sat") > -1){
	$dayWeek = 6;
}        
	$timeText = str_replace(":", "", $timeText);
	$startTime = $timeText; 
	//Calc end time
	$endTime = $startTime + 130;
	$hours = $endTime/100;
	$mins = $endTime%100;
	if($mins >= 60){
		$endTime = $endTime + ($HOURS_AS_INT - $HOUR_MIN_AS_INT);
	}	
	if($currentTime  > $startTime && $currentTime  < $endTime + 10) {
	if($currentDay  ==  $dayWeek){
		$teachers = $teachers . $spreadsheet_data[$i][3] . ",";
		}
}
	}

	
	 


echo $teachers;
	

?>

