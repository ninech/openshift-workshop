<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>OpenShift Workshop</title>
</head>
<body>

  <h1>Hello World, have a great <?= date("l") ?>!</h1>

  <?php
    if (getenv("MYSQL_HOST") == "") {
      die("Please provide the MYSQL_HOST environment variable, so I know where I have to connect to.");
    }

    $mysqli = new mysqli(getenv("MYSQL_HOST"), getenv("MYSQL_USER"), getenv("MYSQL_PASSWORD"), getenv("MYSQL_DATABASE"));
    if ($mysqli->connect_errno) {
      die("Database connection failed: " . $mysqli->connect_error);
    }
  ?>

  <p>Connection to mysql established.</p>

  <?php
    $statement = $mysqli->prepare("SELECT VERSION() as version;");
    $statement->execute();
    $result = $statement->get_result();

    $row = $result->fetch_assoc();
  ?>

  <p>MySQL version: <?= $row["version"] ?></p>
</body>
</html>
