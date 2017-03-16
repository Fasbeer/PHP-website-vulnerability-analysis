<?php
$snippetID = $_POST["snippet_id"];

$conn = new PDO("mysql:dbname=simpsons", "root","");
   // set the PDO error mode to exception
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   // sql to delete a record
   $sql = "DELETE FROM snippets WHERE snippet_id=$snippetID";

   // use exec() because no results are returned
   $conn->exec($sql);
   header( "refresh:1;url=grades.php" );



 ?>
