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
      ;
  }

?>
