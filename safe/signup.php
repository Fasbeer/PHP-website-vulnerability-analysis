<?php
// define variables and set to empty values
$nameErr = $emailErr = $passwordErr = $passConfErr = "";
$errorCount = 0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
		$errorCount++;
  }
	else {
		$name = $_POST["name"];
	}

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
		$errorCount++;

  }
	else {
		$email = $_POST["email"];
	}

  if (empty($_POST["password"])) {
    $passwordErr = "Insert a password";
		$errorCount++;

  }
	else {
		$pw = $_POST["password"];
	}

  if (empty($_POST["passwordConfirm"])) {
    $passConfErr = "Insert your password confirmation";
		$errorCount++;

  }
	else {
		$pwConf = $_POST["passwordConfirm"];
	}

	if($errorCount==0)
	{
		session_start();
		$_SESSION["name"] = $name ;
		$_SESSION["email"] = $email;
		$_SESSION["password"]=$pw ;
		$_SESSION["passwordConfirm"] = $pwConf;



		header("Location: signup-submit.php");

	}


}
?>

<!DOCTYPE html>
<html>
	<!--
	CSE 190 M, Spring 2012
	This page shows a login form for the student to log in to the system.
	Once the student logs in, a PHP session is created so that the other pages
	remember the student and can show that student's grades.
	-->
	<head>
		<title>Sign Up</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link href="simpsons.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
		<div id="logoarea">
			<!-- <img src="simpsons.png" alt="logo" /> -->
		</div>

		<h1>Don't have an account?</h1>


		<form id="signup" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
			<fieldset>
				<legend>Sign Up</legend>
				<p><span class="error">* required field.</span></p>

				<dl>
					<dt>Name</dt>
					<span class="error">* <?php echo $nameErr;?></span>

					<dd>
						<input type="text" name="name" />
					</dd>
          <dt>Email</dt>
					<span class="error">* <?php echo $emailErr;?></span>
					<dd>
						<input type="text" name="email" />
					</dd>
					<dt>Password</dt>
					<span class="error">* <?php echo $passwordErr;?></span>

					<p><i> Password must be at least 8 characters long and contain both uppercase and lowercase letters</i> </p>
					<dd>
						<input type="password" name="password" />
					</dd>

					<dt>Confirm Password</dt>
					<span class="error">* <?php echo $passConfErr;?></span>

					<dd>
						<input type="password" name="passwordConfirm" />
					</dd>

				</dl>
				<input type="submit" value="Sign Up!" />
			</fieldset>
		</form>
	</body>
</html>
