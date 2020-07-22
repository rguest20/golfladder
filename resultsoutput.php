<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "golfladder";
$today = date('d-m-Y', time());
if ($_SERVER["REQUEST_METHOD"] == "POST"){
  $challenger = $_POST["blarg"];
  $challenged = $_POST["blargle"];
  $selector = $_POST["selector"];
  $moreinfo = $_POST["moreinfo"];
  $random = hrtime (TRUE);
  $sql2 = "INSERT INTO `results` (`challenger`, `challenged`, `whowon`, `extrainfo`, `date`,  `challengeno`) VALUES ('$challenger', '$challenged' , '$selector' , '$moreinfo','$today', '$random')";
  $sql4 = "DELETE FROM `challenges` WHERE `challenges`.`challenger` = '$challenger'";
}

// Create connection and collect data
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "SELECT * FROM `ladder`   ORDER BY `Position` ASC";
$sql3 = "SELECT * FROM results";
$ladderData = mysqli_query($conn, $sql);
$ladderDataArray = $ladderData -> fetch_all(MYSQLI_ASSOC);
$resultsData = mysqli_query($conn, $sql3);
$resultsDataArray = $resultsData -> fetch_all(MYSQLI_ASSOC);
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
          <li class="nav-item active">
            <a class="nav-link" href="resultsoutput.php">Current Ladder</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="currentchallenge.php">Current Challenges</a>
          </li>
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle"
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
    <section id="tables" class = "row">
      <div id="ladder" class = "col-6">
        <h3> Ladder </h3>
        <table style="width:100%">
          <tr>
            <th>Posiion</th>
            <th>Person</th>
          </tr>
          <?php
            foreach($ladderDataArray as $x => $y){
              echo '<tr>';
              echo '<td>' . $y['Position'] . '</td>';
              echo '<td>' . $y['Name'] . '</td>';
              echo '</tr>';
            }
           ?>
        </table>
      </div>
      <div id="results" class = "col-6">
        <h3> Recent Results </h3>
        <table class = "container-fluid">
          <tr>
            <th>Challenger</th>
            <th>Challenged</th>
            <th>Winner</th>
            <th>Extra Information</th>
            <th>Date</th>
          </tr>
          <?php
          foreach($resultsDataArray as $x => $y){
            echo '<tr>';
            echo '<td>' . $y['challenger'] . '</td>';
            echo '<td>' . $y['challenged'] . '</td>';
            echo '<td>' . $y['whowon'] . '</td>';
            echo '<td>' . $y['extrainfo'] . '</td>';
            echo '<td>' . $y['date'] . '</td>';
            echo '</tr>';
          }
           ?>
         </table>
      </div>
    </section>
    <section id = 'Information'>
      <form action = "resultsoutput.php">
        <input type = "submit" value = "Update tables">
      </form>
      <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST"){
        if ($conn->query($sql2) === TRUE) {
          echo "Result Inputted <br>";
        }else{
          echo "Error" . $sql2 . "<br>" . $conn->error;
        }
        if ($conn->query($sql4) === TRUE) {
          echo "Challenges updated <br>";
        }else{
          echo "Error" . $sql4 . "<br>" . $conn->error;
        }
        if ($selector==$challenger){
            foreach($ladderDataArray as $x => $y){
              if ($y['Name'] == $challenged){
                $swapposition1 = $y['Position'];
              }
              if ($y['Name'] == $challenger){
                $swapposition2 = $y['Position'];
            }
          }
            $sql5 = "UPDATE `ladder` SET `Position` = '100' WHERE `ladder`.`Position` = '$swapposition1'";
            $sql6 = "UPDATE `ladder` SET `Position` = '$swapposition1' WHERE `ladder`.`Position` = '$swapposition2'";
            $sql7 = "UPDATE `ladder` SET `Position` = '$swapposition2' WHERE `ladder`.`Position` = '100'";
          if ($conn->query($sql5) === TRUE) {
            echo "Position swap 1/3<br>";
          }else{
            echo "Error" . $sql5 . "<br>" . $conn->error;
          }
          if ($conn->query($sql6) === TRUE) {
            echo "Position swap 2/3<br>";
          }else{
            echo "Error" . $sql6 . "<br>" . $conn->error;
          }
          if ($conn->query($sql7) === TRUE) {
            echo "Position swap 3/3<br>";
          }else{
            echo "Error" . $sql7 . "<br>" . $conn->error;
          }
        }
      };
      mysqli_close ($conn);
      ?>
    </section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
<footer>
    <p>Made by Ryan Guest for Aqualate Golf Course 2020</p>
</footer>
</body>
</html>
