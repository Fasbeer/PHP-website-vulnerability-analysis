<!DOCTYPE html>
<html>
	<head>
		<title>Springfield Elementary School</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

		<link href="simpsons.css" type="text/css" rel="stylesheet" />
	</head>

<body>
  <h1> Edit user details </h1>
<?php
session_start();

$id = $_POST["id"];
$name = $_POST["name"];
$email = $_POST["email"];
$pwd = $_POST["pwd"];
$isAdmin = $_POST["isAdmin"];
?>
<form id="updateInfo" action="update_table.php" method="post" >
  <fieldset>
    <dl>
      <dt>Name</dt>
      <dd>
        <input type="text" name="name" value=<?print $name?> />
      </dd>
      <dt>Email</dt>
      <dd>
        <input type="text" name="email" value=<?print $email?> />
      </dd>
      <dt>Password</dt>
      <dd>
        <input type="text" name="pwd"value=<?print $pwd?> />
      </dd>
      <dt>Is Admin?</dt>
      <dd>
        <input type="text" name="isAdmin" value=<?print $isAdmin?> />
      </dd>
    </dl>
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <input type="submit" value="Done" />
  </fieldset>
</form>





</body>
</html>
