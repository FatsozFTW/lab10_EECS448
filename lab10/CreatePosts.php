<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
function checkEmpty()
{
  $a = $_POST["user"];
  $p = $_POST["posty"];
  
  if($a == '' || $p == '')
  {
    echo "Can't leave text fields empty";
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
        echo "Post not added <br> User does not exist";
    }
    else {
        echo "Post was added";
        $adding = "INSERT INTO Posts(content,author_id) VALUES('$p','$a')";
        $mysqli->query($adding);
    }
    $result->free();
    $mysqli->close();
    }
    
}


checkEmpty();
?>
