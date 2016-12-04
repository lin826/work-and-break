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
}

//getting the users data
function getUsers() {

  global $db;

  //fetching users data from database
  $get_users = "select * from 'Users'";

  $run_users = mysqli_query($db, $get_users);

  while($row_users=mysqli_fetch_array($run_users)){
    $user_id = $row_users('user_id');
    $user_pic = $row_users('profile_picture');
    $user_email = $row_users('e_mail');

    echo "<li><img src='$user_pic'><a href='index.php?usr=$user_id'>$user_id:$user_email</a></li>";
  }
}

?>
