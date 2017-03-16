<!DOCTYPE html>
<html>
	<!--
	CSE 190 M, Spring 2012
	This page shows a login form for the student to log in to the system.
	Once the student logs in, a PHP session is created so that the other pages
	remember the student and can show that student's grades.
	-->
	<head>
		<title>Springfield Elementary School</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link href="simpsons.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
		<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="start.php">Blog Post</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">

          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="login.php">Log In</a></li>
            <li><a href="signup.php">Sign Up</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

		<div class = "jumbotron" >
		<h1>Your Blogs - Log In</h1>

		<div class = "myform">
		<form id="login" action="login-submit.php" method="post">
			<fieldset>
				<legend>Log In</legend>
				<dl>
					<dt>Name</dt>
					<dd>
						<input type="text" name="name" />
					</dd>
					<dt>Password</dt>
					<dd>
						<input type="password" name="password" />
					</dd>
				</dl>
				<input type="submit" value="Log in" />
			</fieldset>
		</form>
	</div>
	</div>
	</body>
</html>
