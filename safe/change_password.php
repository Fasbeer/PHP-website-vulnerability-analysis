<?php
session_start();
$oldPW = $_POST["currentPassword"];
$newPW = $_POST["newPassword"];
$recievedToken = $_POST["realToken"];
$name = $_SESSION["name"];
$token = $_SESSION['token'];
$hashedPW;
$realOldPw;



function hashPass($pass) {
	//$input=iconv('UTF-8','UTF-16LE',$pass);
	$hashedPass=bin2hex(mhash(MHASH_MD4,$pass));
	echo $hashedPass;
	return $hashedPass;
}
if($recievedToken==$token){
	print "Token the same";
}
else {
	print "Tokens different, you have been hacked";
	header( "refresh:1;url=start.php" );
}

changePassword($oldPW, $newPW, $name);

# query database to see if user typed the right password
function changePassword($oldPW, $newPW, $name) {
	$db = new PDO("mysql:dbname=simpsons", "root", "");


	$rows = $db->query("SELECT * FROM students WHERE name = 'salt'");
	foreach ($rows as $row) {
	$hashedPW = hashPass($oldPW . $row["salt"]);
	$realOldPw= $row["pwd"];
	$newPW = hashPass($newPW . $row["salt"]);


	}

	if ($realOldPw == $hashedPW)
	{

		$count = $db->exec("UPDATE students SET pwd= '$newPW'  WHERE name='$name'");
		print "Password changed!";
		header( "refresh:1;url=grades.php" );

	}

	else {
		print "Passwords do not match, please try again!";
		header( "refresh:1;url=grades.php" );
		//print $row;
	}

}
?>
