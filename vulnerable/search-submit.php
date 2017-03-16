<!DOCTYPE html>
<html>
<head>
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
          <li><a href="start.php">Log Out</a></li>

        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </nav>
  <div class = "jumbotron">
<div class = "snippets" >
  <h2> Our Users Blogs </h2>
  <div class="table1">
<table class="table table-hover">
  <tr><th>Username</th><th>Snippet</th><th>Date Added</th></tr>

  <?
  $search = $_POST["search"];
  $search1 = $_GET["snip"];
  if ($search1==NULL) {
    $test1 = $search;
  }
  else {
    $test1 = $search1;
  }
  $query = "SELECT u.name, s.snippet, s.dateTime FROM students AS u JOIN snippets AS s ON u.id=s.user_id WHERE isPrivate = 0 AND u.name=$test1";
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
</div>
</div>
</body>
</html>
