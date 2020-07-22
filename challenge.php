<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
  $name = $_POST["yourname"];
  $opponentname = $_POST["opponent"];
} else {
  $opponentname = "bluebanana";
}
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "golfladder";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$sql="SELECT * FROM ladder";
$sql2 = "SELECT * FROM challenges";
$ladder = mysqli_query($conn, $sql);
$challengeData = mysqli_query($conn, $sql2);
$challengeDataArray = $challengeData -> fetch_all(MYSQLI_ASSOC);
$results = $ladder -> fetch_all(MYSQLI_ASSOC);
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
      <a class="navbar-brand" href="index.html">Aqualate Golf Ladder 2020</a>
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
            <a class="nav-link" href="index.html"
              >Home</a
            >
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Current Ladder</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Current Challenges</a>
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
              <a class="dropdown-item" href="challenge.html">Make a challenge<span class="sr-only">(current)</span></a>
              <a class="dropdown-item" href="#">Report Result</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Admin only</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <section id="gameface">
    </section>
    <section id="challenge-form">
    <h2>Challenge Page</h2>
    <p>Please fill out the form below to initiate challenge</p>
        <?php
          if ($opponentname == "bluebanana"){
          echo '<form action="challenge.php" method = "post">';
          echo '<label for = "yourname">Your Name</label>';
          echo '<select name="yourname" id="yourname">';
          echo '<option value="null">Please select an option</option>';
            $output ="";
              foreach($results as $x=>$y){
                $output=$y['Name'];
                echo '<option value="' . $output . '">' . $output . '</option>';
              };
          echo '</select>';
          echo'<input type="submit"> <br>';
          echo '<small>Challenges can only be made against people who are not in challenges up to 3 positions ahead of you in the ladder</small><br>';
        } else {

        };
        if ($opponentname == "bluebanana"){
          echo '<small>Submit your name to continue</small>';
          echo '<input type="text" id="opponent" name = "opponent" value = "no value" hidden>';
        } else {
          echo '<form action="challengeout.php" method = "post">';
          echo '<input type="text" id="yourname" name = "yourname" value = "' . $name . '" hidden>';
          echo '<p>Your Name: ' . $name . '</p>';
          echo '<label for = "opponentname">Who do you challenge?</label>';
          echo '<select name="opponentname" id="opponentname">';
          echo '<option value="basic">Pleae select an option</option>';
          $output ="";
            foreach($results as $x=>$y){
              if($y['Name'] === $name){
                $challengerRank = $y['Position'];
              };
            };

            $potentialChallengers = array();
            foreach($results as $x=>$y){
              if($y['Position'] == $challengerRank - 1 or $y['Position'] == $challengerRank - 2 or $y['Position'] == $challengerRank - 3){
                array_push($potentialChallengers, $y['Name']);
              };
            };
            $alreadyInChallenge = array();
            foreach($challengeDataArray as $x => $y){
              array_push($alreadyInChallenge, $y['challenger']);
              array_push($alreadyInChallenge, $y['challenged']);
            };
            $canBeChallenged = array_diff($potentialChallengers, $alreadyInChallenge);
            $outputchallenge ="";
              foreach($canBeChallenged as $x=>$y){
                $output=$y;
                echo '<option value="' . $output . '">' . $output . '</option>';
              };
              echo '<input type = "submit" value="Challenge"><br>';
            };
        ?>
        </form>
        </section>
    <section id="process">
        <h2>State of current challenge: <span id="actdisact">Inactive</span></h2>
        <h3>Challenge to be completed by
        <?php
        $nextweek = time() + 14*24*60*60;
        echo '2 weeks time: '. date('d-m-Y', $nextweek) ."\n";
        ?>
        </h3>
    </section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
<footer>
    <p>Made by Ryan Guest for Aqualate Golf Course 2020</p>
</footer>
</body>
</html>
