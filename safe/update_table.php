<?php
session_start();
$id = $_POST["id"];
$name = $_POST["name"];
$email = $_POST["email"];
$pwd = $_POST["pwd"];
$isAdmin = $_POST["isAdmin"];




updateTable($id, $name, $email, $pwd, $isAdmin);




# query database to see if user typed the right password
function updateTable($id, $name, $email, $pwd, $isAdmin)
 {

	$db = new PDO("mysql:dbname=simpsons", "root", "");


	$rows = $db->query("SELECT * FROM students");
	foreach ($rows as $row) {
    $count = $db->exec("UPDATE students SET  name = '$name', email = '$email', pwd= '$pwd', isAdmin = $isAdmin WHERE id = $id");
	}

  header( "refresh:2;url=admin.php" );



}
?>
