<?php
session_start();
define('MyConst', TRUE);

if (!isset($_SESSION['token'])) {
    $token = md5(uniqid(rand(), TRUE));
    $_SESSION['token'] = $token;
    $_SESSION['token_time'] = time();
}
else
{
    $token = $_SESSION['token'];
}
?>

<!DOCTYPE html>
<html>
	<!--
	CSE 190 M, Spring 2012
	-->
	<head>
		<title>Blog Posting</title>
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
		<div class="jumbotron">
		<h1>Blog Posting</h1>
		<br>
		<br>

		<ul>
			<!-- Comment out the register page. It doesn't exist.
			<li><a href="register.php">Sign Up for an Account</a></li>
			-->
			<div class = "buttons">
			<a href = "login.php" > <button type="button" class="btn btn-info btn-lg">Log In</button> </a>
			<!-- <a href = "signup.php" > <button type="button" class="btn btn-info btn-lg">Sign Up</button> </a> -->
		</div>


		</ul>
		<div class = "snippets" >
			<h2> Our Users Blogs </h2>
			<div class="table1">
		<table class="table table-hover">
			<tr><th>Username</th><th>Snippet</th><th>Date Added</th></tr>

			<?
			$query = "SELECT u.name, s.snippet, s.dateTime, s.isPrivate FROM students AS u JOIN snippets AS s ON u.id=s.user_id AND s.isPrivate = 1 GROUP BY u.name";
			$db = new PDO("mysql:dbname=simpsons", "root","");
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$rows = $db->query($query);
			foreach ($rows as $row) {
				?>
				<tr>
					<td>
						<?= $row["name"] ?>
					</td>

					<td>
						<?= $row["snippet"] ?>
					</td>

				<td>
					<?= $row["dateTime"] ?>
				</td>
		</tr>
		<?php
	}
	?>
		</table>
	</div>
	<div class = "search" id = "search">
		<form id="search" action="search-submit.php" method="post">
			<input type="text" name="search" value="Enter Search">
		</form>
	</div>
	</div>

	</div>

	</body>
</html>
