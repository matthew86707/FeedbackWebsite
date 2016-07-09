<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    require 'connection.php';
    addRating();
}

function addRating() {
    global $connect;
     require 'Rata.php';
     $funRating = $_POST["funRating"];
     $informationRating = $_POST["informationRating"];
	$teacher = $_POST["teacher"];
	$classId = time();
	//$classId = getClassId($teacher);	

    mysqli_query($connect, "INSERT INTO ratings (funRating,informationRating,teacherName,classID) values ('$funRating','$informationRating','$teacher','$classId');");
    mysqli_close($connect);

}



