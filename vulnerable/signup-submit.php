<?php
$name = $_POST["name"];
$email = $_POST["email"];
$pw = $_POST["password"];
$id= 67;


sign_up($name,$email,$pw, $id);
header( "refresh:2;url=start.php" );


# query database to see if user typed the right password
function sign_up($name,$email, $pw, $id) {
	$db = new PDO("mysql:dbname=simpsons", "root", "");
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	//$db->query("INSERT INTO students VALUES (777, $name, $email, $pw)");

  // prepare sql and bind parameters
  $stmt = $db->prepare("INSERT INTO students (name, email, pwd)
  VALUES ( :name, :email, :pwd)");
  //$stmt->bindParam(':id', $id);
  $stmt->bindParam(':name', $name);
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':pwd', $pw);




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
