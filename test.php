<!DOCTYPE html>
<html>
   <head>
   
<!--   <h1 align="center"> It's Finished...Mostly...!</h1> --!>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css" integrity="sha384-aUGj/X2zp5rLCbBxumKTCw2Z50WgIr1vs/PFN4praOTvYXWlVyh2UtNUU0KAUhAX" crossorigin="anonymous">
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	  
<!--	  <script type="text/javascript" src="snowstormv144_20131208/snowstorm.js"></script>
	  <script type="text/javascript">
		snowStorm.snowColor = '#ffff00'; 
		snowStorm.flakesMaxActive = 1136;    // show more snow on screen at once
		snowStorm.flakesMax = 1000;
		snowStorm.useTwinkleEffect = false; // let the snow flicker in and out of view
		snowStorm.flakeWidth = 140;
		snowStorm.flakeHeight = 140;
		</script>

--!>
   </head>
   <body style="padding-top: 20px; );">
      <div class="container">


         <div class="row">
            <div class="col-md-4">
               <div class="panel panel-primary "style="height:230px;">
                  <div class="panel-heading">The League</div>
                  <div class="panel-body">
                     <div style="float:left;" >
                        <img src="leagueLogo.png" align="middle" alt="Logo" style="width:126px;height:105px;">
                     </div>
			
			<?php
			$servername = "mysql.jointheleague.org";
			$username = "leaguefeedback";
			$password = "EcPO1FW*Z&uOA@0j";
			$dbname = "feedback_jointheleague_org";

			$dataArray = array();			

			$conn = new mysqli($servername, $username, $password, $dbname);

			$sql = "SELECT funRating FROM ratings";
			$result = $conn->query($sql);
			

			if ($result->num_rows > 0) {
			    // output data of each row
			    while($row = $result->fetch_assoc()) {
				$dataArray[] =  $row["funRating"];
			    }
			}
			
			$result = $conn->query("SELECT AVG(funRating) FROM ratings");
			$row = $result->fetch_array();
			if(round($row['AVG(funRating)'], 2, PHP_ROUND_HALF_UP) >= 3.5){
								echo " <span class='label label-primary'>"; 
								}
								if(round($row['AVG(funRating)'], 2, PHP_ROUND_HALF_UP) < 3.5 && round($row['AVG(funRating)'], 2, PHP_ROUND_HALF_UP) >= 2){
								echo " <span class='label label-warning'>"; 
								}
								if(round($row['AVG(funRating)'], 2, PHP_ROUND_HALF_UP) < 2 && round($row['AVG(funRating)'], 2, PHP_ROUND_HALF_UP) >= 0){
								echo " <span class='label label-danger'>"; 
								}
			echo "Average Fun Rating: " . round($row['AVG(funRating)'], 2, PHP_ROUND_HALF_UP) ;
			echo "</span>";


			$result = $conn->query("SELECT AVG(informationRating) FROM ratings");
			$row = $result->fetch_array();
			if(round($row['AVG(informationRating)'], 2, PHP_ROUND_HALF_UP) >= 3.5){
								echo " <span class='label label-primary'>"; 
								}
								if(round($row['AVG(informationRating)'], 2, PHP_ROUND_HALF_UP) < 3.5 && round($row['AVG(informationRating)'], 2, PHP_ROUND_HALF_UP) >= 2){
								echo " <span class='label label-warning'>"; 
								}
								if(round($row['AVG(informationRating)'], 2, PHP_ROUND_HALF_UP) < 2 && round($row['AVG(informationRating)'], 2, PHP_ROUND_HALF_UP) >= 0){
								echo " <span class='label label-danger'>"; 
								}
			echo "Average Learning Rating: " . round($row['AVG(informationRating)'], 2, PHP_ROUND_HALF_UP);
			$conn->close();
			?>
	 
                  </div>
               </div>
            </div>
            <div class="col-md-8">
	<?php
		
			echo '<script src="/Chart.js-master/src/Chart.Line.js">';
			echo '<script type="text/javascript">' ,
				'addData(' . array("1", "5", "2") . ',"lol");',
				'</script> </script>';
        ?>	
               <div class="panel panel-primary" style="height:230px;">
                  <div class="panel-heading">Graph</div>
                  <div class="panel-body" style="padding-top: 10px; padding-bottom: 0px; padding-right:0px; padding-left: 0px;">

			<iframe src="/Chart.js-master/samples/line.html" scrolling = "no" style="width:100%; height:150%;" >
			</iframe>	
			<?php
			$servername = "mysql.jointheleague.org";
			$username = "leaguefeedback";
			$password = "EcPO1FW*Z&uOA@0j";
			$dbname = "feedback_jointheleague_org";

			$dataArray = array();			

			$conn = new mysqli($servername, $username, $password, $dbname);

			$sql = "SELECT funRating FROM ratings";
			$result = $conn->query($sql);
			

			if ($result->num_rows > 0) {
			    // output data of each row
			    while($row = $result->fetch_assoc()) {
				$dataArray[] =  $row["funRating"];
			    }
			}
			foreach($dataArray as $val){
			}
			$conn->close();
			echo '<script src="/Chart.js-master/src/Chart.Line.js">';
			echo '<script type="text/javascript">' ,
				'addData(' . $dataArray . ',Lol);',
				'</script> </script>';	
			?>

		</div>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-4">
               <div class="panel panel-primary" style="height:700px;">
                  <div class="panel-heading">Teachers</div>
                  <div class="panel-body">
                     <ul class="list-group">
					 		<?php
							$servername = "mysql.jointheleague.org";
							$username = "leaguefeedback";
							$password = "EcPO1FW*Z&uOA@0j";
							$dbname = "feedback_jointheleague_org";

							$dataArray = array();			

							$conn = new mysqli($servername, $username, $password, $dbname);
							$currentMonthMin = time() - 2500000;
							$sql = "SELECT teacherName, classID, AVG(funRating) FROM ratings WHERE classID>" .  $currentMonthMin . " GROUP BY teacherName" ;
							$result = $conn->query($sql);
			

							if ($result->num_rows > 0) {
							 // output data of each row
							while($row = $result->fetch_assoc()) {
							$dataArray[] = $row;
							}
						
							print_r($dataArrayFun);
							for($i = 0; $i < count($dataArray); $i++){
								echo "  <li class='list-group-item'> ";
								echo $dataArray[$i]['teacherName'];
								echo "  
							<ul class='dropdown-menu'>
							    <li><a href='#'>Action</a></li>
							    <li><a href='#'>Another action</a></li>
							    <li><a href='#'>Something else here</a></li>
							    <li role='separator' class='divider'></li>
							    <li><a href='#'>Separated link</a></li>
							  </ul> ";
								echo "<div style='float:right;'> ";

								if(round($dataArray[$i]['AVG(funRating)'], 2, PHP_ROUND_HALF_UP) >= 3.5){
								echo " <span class='label label-primary'>"; 
								}
								if(round($dataArray[$i]['AVG(funRating)'], 2, PHP_ROUND_HALF_UP) < 3.5 && round($dataArray[$i]['AVG(funRating)'], 2, PHP_ROUND_HALF_UP) >= 2){
								echo " <span class='label label-warning'>"; 
								}
								if(round($dataArray[$i]['AVG(funRating)'], 2, PHP_ROUND_HALF_UP) < 2 && round($dataArray[$i]['AVG(funRating)'], 2, PHP_ROUND_HALF_UP) >= 0){
								echo " <span class='label label-danger'>"; 
								}
                             
							  echo round($dataArray[$i]['AVG(funRating)'], 2, PHP_ROUND_HALF_UP); 
							  echo "</span>
                           </div>
                        </li>";
							}
						}
			$conn->close();
			?>
                       
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="col-md-8">
               <div class="panel panel-primary" style="height:700px;">
                  <div class="panel-heading">All Data</div>
                  <div class="panel-body">
                     <iframe src="data.php" style="width:100%; height:620px;">
                     </iframe>
                  </div>
               </div>
            </div>
         </div>
      </div>

   </body>
   <style type="text/css">
      body { background: #DBDBDB  !important; } /* Adding !important forces the browser to overwrite the default style applied by Bootstrap */
   </style>
</html>
