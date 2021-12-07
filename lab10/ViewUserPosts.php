<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

function run() {
    $mysqli = new mysqli("mysql.eecs.ku.edu", "j654t520", "thie3kae", "j654t520");
    if($mysqli->connect_errno)
    {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit(0);
    }
    $theUser = $_POST["user"];
    $query = "SELECT * FROM Posts WHERE author_id = '$theUser'";
    $result = $mysqli->query($query);
    if($result->num_rows != 0) {
        while ($row = $result->fetch_assoc()) {
            
            echo "<tr> <td>  - " . $row["content"] . "</td> </tr>";
        }
    }
    else
    {
        echo " <tr> <td> There are no posts </td> </tr>";
    }
    $result->free();
    $mysqli->close();
}
$theUser = $_POST["user"];
echo "<h2> Viewing User " . $theUser ."'s Posts </h2>";
echo "<table>";
run();
echo "</table>";
?>