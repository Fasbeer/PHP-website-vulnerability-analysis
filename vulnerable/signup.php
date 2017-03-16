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


		<form id="signup" action="signup-submit.php" method="post">
			<fieldset>
				<legend>Sign Up</legend>
				<dl>
					<dt>Name</dt>
					<dd>
						<input type="text" name="name" />
					</dd>
          <dt>Email</dt>
					<dd>
						<input type="text" name="email" />
					</dd>
					<dt>Password</dt>
					<dd>
						<input type="password" name="password" />
					</dd>

				</dl>
				<input type="submit" value="Sign Up!" />
			</fieldset>
		</form>
	</body>
</html>
