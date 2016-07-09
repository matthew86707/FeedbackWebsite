<head>  </head>

      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css" integrity="sha384-aUGj/X2zp5rLCbBxumKTCw2Z50WgIr1vs/PFN4praOTvYXWlVyh2UtNUU0KAUhAX" crossorigin="anonymous">

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


echo '<table class="table table-striped">
    <thead>
      <tr>
        <th>Teacher</th>
        <th>Fun</th>
        <th>Info</th>
		<th>Time</th>
      </tr>
    </thead>
    <tbody>';

if ($result->num_rows > 0) {
	
  
     
    // output data of each row
    while($row = $result->fetch_assoc()) {
		echo '<tr>';
        echo '<td>' . $row["teacherName"] . '</td>';
		echo '<td>' . $row["funRating"] . '</td>';
		echo '<td>' . $row["informationRating"] . '</td>';
		echo '<td>' . $row["classID"] . '</td>';
		echo '</tr>';
    }
	
} else {
   // echo "0 results";
}

	echo '</tbody>';
$conn->close();
?>
