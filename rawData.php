
<?php
$servername = "mysql.jointheleague.org";
$username = "leaguefeedback";
$password = "EcPO1FW*Z&uOA@0j";
$dbname = "feedback_jointheleague_org";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT classID, teacherName, funRating, informationRating FROM ratings";
$result = $conn->query($sql);

//echo "ClassID", str_repeat('&nbsp;', 8),"Teacher", //str_repeat('&nbsp;', 8), "Fun", str_repeat('&nbsp;', 8),     //"Learn", "<br>";
$numberEcho = 0;
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
	if($numberEcho < 20){
       echo  $row["informationRating"] . "," . $row["funRating"] . ",";
		$numberEcho++;
	}

    }
} else {
    echo "0 results";
}
$conn->close();
?>
