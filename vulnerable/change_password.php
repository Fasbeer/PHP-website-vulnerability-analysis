<?php
session_start();
$newPW = $_POST["newPassword"];
$name = $_SESSION["name"];

changePassword($oldPW, $newPW, $name);




# query database to see if user typed the right password
function changePassword($oldPW, $newPW, $name) {
	$db = new PDO("mysql:dbname=simpsons", "root", "");


	$rows = $db->query("SELECT * FROM students WHERE name = 'Bart'");
	$count = $db->exec("UPDATE students SET pwd= '$newPW'  WHERE name='$name'");
	print "Password changed!";
	header( "refresh:1;url=grades.php" );



}
?>
