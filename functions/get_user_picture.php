<?php
	$servername = "localhost";
	$username = "client";
	$password = "cs102062374";
	$dbname = "Work_n_break";


	// Create connection
	$conn = new mysqli($servername, $username, $password);

	// Check connection
	if ($conn->connect_error) {
			echo("Connection failed");
    	die("Connection failed: " . $conn->connect_error);
	} else {
		$conn->select_db( $dbname );
		if(isset($_GET['ID']) && !empty($_GET['ID']))
		{
			//include_once 'db.php';
			//extract($_POST); // extract post variables
			$arr = json_decode($_GET['ID']);
			foreach($arr as $item){
				//check if facebook ID already exits
				$check_user_query = "select user_picture, user_is_online from Users WHERE user_id = '".$item."'";
				$pic = $conn->query($check_user_query)->fetch_row();
				echo($pic[0].";".$pic[1].";");
			}
		} else {
			var_dump($_GET);
		}
	}
	$conn->close();
?>
