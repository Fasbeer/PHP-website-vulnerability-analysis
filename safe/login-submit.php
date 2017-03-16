<?php

session_start();
$allowed = "Yes";
$_SESSION["allowed"] = $allowed;

define('MyConst', TRUE);



$name = $_POST["name"];
$pw = $_POST["password"];

if (is_correct_password($name, $pw) == 2) {
	# redirect?
	session_start();

	$_SESSION["name"] = $name;
	header("Location: grades.php");
	die();
}
elseif (is_correct_password($name, $pw)== 1)
{
	session_start();
	$_SESSION["name"] = $name;
	header("Location: admin.php");
	die();
}
else {
	print "Incorrect Password!";
	header( "refresh:2;url=start.php" );
}

function hashPass($pass) {
	//$input=iconv('UTF-8','UTF-16LE',$pass);
	$hashedPass=bin2hex(mhash(MHASH_MD4,$pass));
	echo $hashedPass;
	return $hashedPass;
}

# query database to see if user typed the right password
function is_correct_password($name, $pw) {
	$db = new PDO("mysql:dbname=simpsons", "root", "");
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$rows = $db->query("SELECT pwd, salt, isAdmin FROM students WHERE name = '$name'");
	foreach ($rows as $row) {
		$correct_password = $row["pwd"];
		$hashedPw = hashPass($pw . $row["salt"]);
		$isAdmin = $row["isAdmin"];

		if ($hashedPw == $correct_password && $isAdmin == '1') {
			return 1;
		}
		elseif ($hashedPw == $correct_password && $isAdmin == '0') {
			return 2;
		}
	}
	return FALSE;
}
?>
