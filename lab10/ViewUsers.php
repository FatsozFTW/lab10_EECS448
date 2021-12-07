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
    $query = "SELECT * FROM Users";
    $result = $mysqli->query($query);
    if($result) {
        while ($row = $result->fetch_assoc()) {
            
            echo "<tr> <td>  - " . $row["user_id"] . "</td> </tr>";
        }
    }
    $result->free();
    $mysqli->close();
}
echo "<h2> View Users </h2>";
echo "<table>";
echo "<tr>";
echo "<th> User Id(s)</th>";
echo "</tr>";
run();
echo "</table>";
?>