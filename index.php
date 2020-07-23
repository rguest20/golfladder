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
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Golf Ladder - Aqualate 2020</title>
  </head>
  <body>
    <section = class="row">
    <nav class="navbar navbar-expand-lg navbar-light bg-light col-12">
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
          <li class="nav-item active">
            <a class="nav-link" href="index.html"
              >Home <span class="sr-only">(current)</span></a
            >
          </li>
          <li class="nav-item">
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
              <a class="dropdown-item" href="challenge.php">Make a challenge</a>
              <a class="dropdown-item" href="currentchallenge.php">Report Result</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Admin only</a>
            </div>
          </li>
        </ul>
      </div>
      <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary d-none d-md-inline" data-toggle="modal" data-target="#exampleModalCenter">
      Contact Your Fellow Golfers
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Contact Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p pre>Stuart Alderson		07785 733257</p>
            <p pre>Steve Courtney		07768 964689	01785 850139</p>
            <p pre>Digby Gould		<s>07841 019454</s>	01785 224848</p>
            <p pre>Roger Guest		07503 225708	01743 367185</p>
            <p pre>John Hall			07447 027708</p>
            <p pre>David Hoare		07779 903843</p>
            <p pre>Kevin Hicken		07702 376180	01902 745808</p>
            <p pre>Martin Jacks		07500 830621	01785 227688</p>
            <p pre>Chris Jones		07905 861467	01952 822879</p>
            <p pre>John Lysko		07974 938074</p>
            <p pre>Barry McKinnon		07857 427197	01952 605973</p>
            <p pre>Bill McKinnon		07751 752370</p>
            <p pre>Brian Plant		07376 253110	01952 814552</p>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    </nav>
  </section>
    <section class="row">
      <div id="heroimage" class="col-12"></div>
    </section>
    <article class = "d-none d-md-block row justify-content-center" id="introduction">
      <div class="col-8 offset-2">
        <h2>Origins of the Ladder</h2>
        <p>During the COVID lockdown of 2020, this ladder was brought in as a way for golfers to be able to continue to play in an organised competition, whilst still maintaining the rules of social distancing set down by the government.</p>
        <br>
        <h2>Rules of the Ladder</h2>
        <ol id="rules">
            <li>Setup
              <ol id="indented">
                <li>	Initial positions on the ladder will be drawn randomly.</li>
                <li>	A player joining the competition after the start of the competition will begin at the bottom of the ladder.</li>
                <li>	The main competition will run until the end of December 2020, with the last date for making challenges being 30th November 2020</li>
                <li>	During the final month of challenges (ie. after 31st October 2020), no challenges will be allowed that involve only players in the top three positions on the ladder. This is to ensure a fair opportunity for players in lower positions to challenge for a place in the deciding ‘knock out’ games.</li>
                <li>	After the main competition is completed, the top four places will play ‘knock out’ games to decide the overall competition winner (1st vs 4th & 2nd vs 3rd, with the winners of those games to play in a final).</li>
                <li>	All games will be 18 hole match play, using full official handicaps on the day of the game. The player with the higher handicap will receive a number of strokes equal to the difference between the two player’s handicaps.</li>
              </ol>
            </li>
            <li id="indented">Making Challenges
              <ol>
                <li>A challenge can be made against another player up to 3 places higher on the ladder.</li>
                <li>A player can only be involved in one challenge at a time.</li>
                <li>Unless a player is already involved in an uncompleted challenge, all challenges must be accepted.</li>
                <li>The game to complete a challenge is to be played within three weeks of the date the challenge is made. The player being challenged will offer at least two reasonable dates/times for the game within the three week period, or forfeit the challenge.</li>
                <li>If both players agree that it is not possible to play a game on the agreed date due to course conditions, the players involved can agree an alternative date up to one week later.</li>
                <li>If the challenger wins the game, then the positions of those players on the ladder will be exchanged. If the challenger loses the game (or in the event of a tie), then there will be no change to positions on the ladder.</li>
                <li>Players involved in a challenge cannot re-challenge the same opponent until they have played in at least one challenge against another player.</li>
              </ol>
            </li>
         </ol>
        <h3>Quick links</h3>
      </div>
    </article>
    <section class="row" id="quickmenu">
        <a href="challenge.php" class ="col-12 col-md-4 offset-md-2" id = "challengepic">
            <div id="challengetxt">Make a challenge
            </div>
        </a>
        <a href="currentchallenge.php" class ="col-12 col-md-4" id = "resultspic">
            <div id="resultstxt">Return your results
            </div>
        </a>
    </section>
    <footer>
        <p>Made by Ryan Guest for Aqualate Golf Course 2020</p>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
  </body>
</html>
