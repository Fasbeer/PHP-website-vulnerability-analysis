<?php
session_start();
$name = $_SESSION["name"];
$snippet = $_POST["snippet"];
$private = $_POST["private"];

$userid= 872;
if ($private=="yes"){
	$isPrivate= 0;

}
else {
	$isPrivate= 1;

}

$newstr = filter_var($snippet, FILTER_SANITIZE_STRING);

add_snippet($newstr,$userid,$isPrivate,$name);

header( "refresh:2;url=grades.php" );


# query database to see if user typed the right password
function add_snippet($snippet,$userid,$isPrivate,$name) {
	$db = new PDO("mysql:dbname=simpsons", "root", "");
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	//$db->query("INSERT INTO students VALUES (777, $name, $email, $pw)");


	$rows = $db->query("SELECT id FROM students WHERE name = '$name'");
	foreach ($rows as $row) {
		$userID = $row["id"];

		}


  // prepare sql and bind parameters
  $stmt = $db->prepare("INSERT INTO snippets (snippet, user_id, isPrivate)
  VALUES (:snippet, :user_id, :isPrivate)");
  $stmt->bindParam(':snippet', $snippet);
  $stmt->bindParam(':user_id', $userID);
  $stmt->bindParam(':isPrivate', $isPrivate);

  $stmt->execute();


  }
?>
