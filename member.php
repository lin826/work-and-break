<?php
if(isset($_GET['fid']) && !empty($_GET['fid'])){
  $servername = "localhost";
	$username = "client";
	$password = "cs102062374";
	$dbname = "Work_n_break";

	// Create connection
	$conn = new mysqli($servername, $username, $password);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	} else {
    $check_user_query = 'select * from Users WHERE user_id = "'.$_GET['fid'].'"';
  }
	$conn->close();
}

?>

<!DOCTYPE html>
<html>
<head>
  <!--Button from https://proto.io/freebies/onoff/-->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" href="styles/layout.css" type="text/css">
  <title>Pomodoro Online Social Society</title>
  <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
  <script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
</head>
<body style="background-color:#F5F5F5">
  <!-- <script type="text/javascript" src="includes/member_script.js"></script> -->
  

  <div id="div_index">
    <div>
    	<p class="txt_index_title" style="font-family: 'Times New Roman', Times, serif;">Pomodoro Online Social Society</p>
 	  </div>
    <!-- Profile Div -->
    <div class="index">
      <img src=<?php echo 'https://graph.facebook.com/'.$_GET['fid'].'/picture?type=large'; ?> class="img_round"></img>
      <canvas id="myChart" width="400" height="400"></canvas>
    </div>


</body>
</html>
