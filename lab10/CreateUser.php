<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
function checkEmpty()
{
  $a = $_POST["user"];
  
  if($a == '')
  {
    echo "User was not added";
  }
  else {
    $mysqli = new mysqli("mysql.eecs.ku.edu", "j654t520", "thie3kae", "j654t520");
    if($mysqli->connect_errno)
    {
      printf("Connect failed: %s\n", $mysqli->connect_error);
      exit(0);
    }
    $query = "SELECT * FROM Users WHERE user_id = '$a'";
    $result = $mysqli->query($query);
    if($result->num_rows == 0) {
      echo "user was added";
        $adding = "INSERT INTO Users(user_id) VALUES('$a')";
        $mysqli->query($adding);
    }
    else {
      echo "user already exists";
    }
    $result->free();
    $mysqli->close();
  }
  
}

checkEmpty();
?>
