<?php
session_start();

$name = $_SESSION["name"];
$email = $_SESSION["email"];
$pw = $_SESSION["password"];
$pwConf = $_SESSION["passwordConfirm"];

$id= 67;






if (checkEqual($pw, $pwConf)) {
	print "Please make sure your passwords are equal";
}
elseif (!checkPassword($pw)) {
	print "Make sure your password follows the rules";
}
else {
	print "You are signed up!";
	sign_up($name,$email,$pw, $id);
}



header( "refresh:2;url=start.php" );

function checkPassword($pw) {
	if ( trim( $pw, 'a..z') != '' && trim( $pw, 'A..Z') != '' && strlen($pw) >= 8 )
{
  /* Password validation passes, do stuff. */
	return True;
}
else {
  /* Password validation fails, show error. */
	return False;
}
}

function checkEqual($pw, $pwConf)
{
	if ($pw == $pwConf){
		return False;
	}
	else {
		return True;
	}
}

function hashPass($pass) {
	//$input=iconv('UTF-8','UTF-16LE',$pass);
	$hashedPass=bin2hex(mhash(MHASH_MD4,$pass));
	return $hashedPass;
}

function sign_up($name,$email, $pw, $id) {
	$db = new PDO("mysql:dbname=simpsons", "root", "");
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	//$db->query("INSERT INTO students VALUES (777, $name, $email, $pw)");
	$salt = mcrypt_create_iv(8);
	//$pwsalt = $pw + $salt
	$pwsalt = $pw . $salt;
	$pw1 = hashPass($pwsalt);
  // prepare sql and bind parameters
  $stmt = $db->prepare("INSERT INTO students (name, email, pwd, salt)
  VALUES ( :name, :email, :pwd, :salt)");
  //$stmt->bindParam(':id', $id);
  $stmt->bindParam(':name', $name);
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':pwd', $pw1);
	$stmt->bindParam(':salt', $salt);




	try {
   $stmt->execute();
   // do other things if successfully inserted
} catch (PDOException $e) {
   if ($e->errorInfo[1] == 1062) {
      // duplicate entry, do something else
			print "Please choose a unique username!";
			header( "refresh:2;url=signup.php" );

   }
}




  }
?>
