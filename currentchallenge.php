<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "golfladder";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "SELECT * FROM challenges";
$challengeData = mysqli_query($conn, $sql);
$challengeDataArray = $challengeData -> fetch_all(MYSQLI_ASSOC);
mysqli_close ($conn);
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link
      href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
    />
    <link rel="stylesheet" href="assets/css/style.css" />
    <title>Title</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="index.php">Aqualate Golf Ladder 2020</a>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php"
              >Home</a
            >
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Current Ladder</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="currentchallenge.php">Current Challenges</a>
          </li>
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle active"
              href="#"
              id="navbarDropdown"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >
              Actions
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="challenge.php">Make a challenge<span class="sr-only">(current)</span></a>
              <a class="dropdown-item" href="currentchallenge.php">Report Result</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Admin only</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <section id="gameface">
    </section>
    <section id="current-challenges">
    <h2>Results/Current Challenges</h2>
    <p>These are the challenges currently being made. To give a result, please select your challenge.</p>
    </section>
    <form id = "results" method = "POST" action = "currentchallenge.php">
      <?php
        foreach($challengeDataArray as $x => $y){
          $challengenum = $x+1;
          echo 'Challenge ' . $challengenum . ': ' . $y['challenger'] . ' VS. ' . $y['challenged'] . ' to be completed by ' . $y['date_complete'] . '</label><br>';
      }
      echo '<br><h5> Which result would you like to return?</h5>';
      echo '<select name = "selector" value = "' . $y['challenger'] . '">';
        foreach($challengeDataArray as $x => $y){
            echo '<option value= "' . $y['challenger'] . '">  Challenge: ' . $y['challenger'] . ' VS. ' . $y['challenged'] . '</option>';
        }
      echo '<input type="submit" value = "Return Result" id="submitbutton">';
         ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
<footer>
    <p>Made by Ryan Guest for Aqualate Golf Course 2020</p>
</footer>
</body>
</html>
