<?php
session_start();
$allowed = $_SESSION["allowed"];



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




			<?php
			$name = $_SESSION["name"];
			?>
			<div class = "jumbotron" >
			<h1>Hello, <? print $name; ?>. </h1>
			<br>
			<div class = "buttons" >
			<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Change Password</button>


						<!-- Modal -->
			<div id="myModal" class="modal fade" role="dialog">
			  <div class="modal-dialog">

			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">Change your password</h4>
			      </div>
			      <div class="modal-body">
							<form id="passwordchange" action="change_password.php" method="post" >
								<fieldset>
									<dl>
										<dt>Current Password</dt>
										<dd>
											<input type="password" name="currentPassword" />
										</dd>
										<dt>New Password</dt>
										<dd>
											<input type="password" name="newPassword" />

											<input type="hidden" name="realToken" value="<?php print $_SESSION['token'] ?>"/>

										</dd>
									</dl>
									<input type="submit" value="Change" />
								</fieldset>
							</form>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      </div>
			    </div>

			  </div>
			</div>

			<!-- SNIPPET -->

			<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal2">Add Snippet</button>
			<a href = "logout.php" > <button type="button" class="btn btn-info btn-lg">Log Out</button> </a>


						<!-- Modal -->
			<div id="myModal2" class="modal fade" role="dialog">
			  <div class="modal-dialog">

			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">Add a snippet</h4>
			      </div>
			      <div class="modal-body">
							<form id="addSnippet" action="add_snippet.php" method="post" >
								<fieldset>
									<dl>
										<dt>Snippet</dt>
										<dd>
											<input type="text" name="snippet" />
										</dd>
										<dt>Private Snippet? <dt>
										<dd>
											<input type="radio" name="private" value="yes"> Yes<br>
											<input type="radio" name="private" value="no"> No<br>



										</dd>
							
									</dl>
									<input type="submit" value="Sumbit" />
								</fieldset>
							</form>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      </div>
			    </div>

			  </div>
			</div>

			<div class="table1">

			<table class="table table-hover">
				<tr><th>Snippets</th> <th>Delete Snippet</th></tr>
				<?
				$db = new PDO("mysql:dbname=simpsons", "root", "");
				$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$rows = $db->query("SELECT id FROM students WHERE name = '$name'");
				foreach ($rows as $row) {
					$userID = $row["id"];

					}
				 ?>

				 <?
	 			$query = "SELECT snippet, snippet_id from snippets WHERE snippets.user_id = $userID";
	 			$db = new PDO("mysql:dbname=simpsons", "root", "");
	 			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	 			$rows = $db->query($query);
	 			foreach ($rows as $row) {
	 				?>
	 				<tr>


	 					<td>
	 						<?= $row["snippet"] ?>
	 					</td>

						<td>
							<form id="deleteSnippet" action="delete_snippet.php" method="post" >
								<fieldset>
									<input type="hidden" name="snippet_id" value="<?php echo $row["snippet_id"]; ?>">
									<input type="hidden" name="name" value="<?php echo $row['name']; ?>">


									<input type="submit" value="Delete" />
								</fieldset>
							</form>

	 					</td>



	 		</tr>
	 		<?php
	 	}
	 	?>

	</table> </div> </div>
</div>


	</body>
</html>
