<?php
  $servername = "localhost";
  $username = "client";
  $password = "cs102062374";
  $dbname = "Work_n_break";

  // Create connection
  $conn = new mysqli($servername, $username, $password);

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  } else {
    $update_user_query = "update Users set user_is_online = 'FALSE' WHERE user_id = $id";
    if ($conn->query($update_user_query) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
  }

?>
