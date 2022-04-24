<?php

$servername = "/var/run/mysqld/mysqld.sock";
$username = "my_app";
$password = "my_app";
$database = "my_app";
 
$conn = new PDO("mysql:unix_socket=$servername;dbname=$database", $username, $password);
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

echo "Connected to the DB!";

$sql = "INSERT INTO my_table (title) VALUES (?)";
$now = new DateTime();
$stmt= $conn->prepare($sql);
$stmt->execute([$now->format('Y-m-d H:i:s')]);

$sql = "SELECT id, title FROM my_table";
$stmt = $conn->query($sql);
?>

<ul>

<?php
while ($row = $stmt->fetch()) {
    echo '<li>' . $row['id'] . ": " . $row['title'] . "</li>\n";
}
?>

</ul>
