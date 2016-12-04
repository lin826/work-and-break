<?php
	$servername = "localhost";
	$username = "client";
	$password = "cs102062374";
	$dbname = "Work_n_break";

	$id = $_POST['ID'];
	$name = $_POST['NAME'];
	$email = $_POST['EMAIL'];
	$pic = $_POST['PIC'];

	// Create connection
	$conn = new mysqli($servername, $username, $password);

	// Check connection
	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	} else {
		$conn->select_db( $dbname );
		if(isset($id) && !empty($id))
		{
			//include_once 'db.php';
			//extract($_POST); // extract post variables

			//check if facebook ID already exits
			$check_user_query = "select * from Users WHERE user_id = '$id'";
			$check_user = $conn->query($check_user_query);
			if($check_user->num_rows == 0)
			{
				//new user - we need to insert a record
				$time = time();
				$insert_user_query = "Insert into Users (`user_id`, `user_picture`, `user_email`,`user_name`,`user_status_value`,`user_status_text`,`user_is_online`)
					VALUES ('$id', '$pic', '$email','$name','','','TRUE')";
				if ($conn->query($insert_user_query) === TRUE) {
    				$last_id = $conn->insert_id;
    				echo "New record created successfully. Last inserted ID is: " . $last_id;
				} else {
    				echo "Error: " . $sql . "<br>" . $conn->error;
				}
			}
			else {
				//update
				$update_user_query = "update Users set user_picture = '$pic', user_email='$email', user_name='$name' WHERE user_id = $id";
				if ($conn->query($update_user_query) === TRUE) {
    				echo "Record updated successfully";
				} else {
    				echo "Error updating record: " . $conn->error;
				}
			}
		} else {
			$arr = array('error' => 1);
			echo json_encode($arr);
		}
	}
	$conn->close();
	//header("Location: http://localhost/Timer_12_02/");
	//die();

?>
