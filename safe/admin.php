<?php
session_start();
$allowed = $_SESSION["allowed"];
print $allowed;
if ($allowed !== "Yes") {
  header( "refresh:2;url=start.php" );
	die('You can not access this page without logging in!');

}  ?>
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
						<li><a href="logout.php">Log Out</a></li>

          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>


		<div class = "jumbotron" >
			<div class = "table1" >
		<table class="table table-hover">
			<tr><th>ID</th><th>Name</th><th>Email</th><th>Password</th><th>Admin?</th><th>Edit</th></tr>

			<?php
			session_start();
			$name = $_SESSION["name"];
			?>
			<h1>Hello, <? print $name; ?> - Admin Page </h1>
			<h2> System Users </h2>


			<?
			$query = "SELECT *
			          FROM students";
			$db = new PDO("mysql:dbname=simpsons", "root", "");
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$rows = $db->query($query);
			foreach ($rows as $row) {
				?>

				<tr>
					<td>
						<?= $row["id"] ?>
					</td>

					<td>
						<?= $row["name"] ?>
					</td>

				<td>
					<?= $row["email"] ?>
				</td>

				<td>
					<?= $row["pwd"] ?>
				</td>

			<td>
				<?= $row["isAdmin"] ?>
			</td>

			<td>

				<form id="editInfo" action="edit_info.php" method="post" >
					<fieldset>
						<input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
						<input type="hidden" name="name" value="<?php echo $row['name']; ?>">
						<input type="hidden" name="email" value="<?php echo $row['email']; ?>">
						<input type="hidden" name="pwd" value="<?php echo $row['pwd']; ?>">
						<input type="hidden" name="isAdmin" value="<?php echo $row['isAdmin']; ?>">

						<input type="submit" value="Edit" />
					</fieldset>
				</form>




			</td>
		</tr>

				<?php
			}
			?>

		</table>
	</div>
</div>



	</body>
</html>
