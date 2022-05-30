<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="dist/jquery.bracket.min.js"></script>

<link href="dist/jquery.bracket.min.css" rel="stylesheet">
</head>
<body>

<div class="demo">
</div>

<script type="text/javascript">
	var singleElimination = {
  "teams": [              // Matchups
    ["Team 1", "Team 2"], // First match
    ["Team 3", "Team 4"]  // Second match
  ],
  "results": [            // List of brackets (single elimination, so only one bracket)
    [                     // List of rounds in bracket
      [                   // First round in this bracket
        [1, 2],           // Team 1 vs Team 2
        [3, 4]            // Team 3 vs Team 4
      ],
      [                   // Second (final) round in single elimination bracket
        [5, 6],           // Match for first place
        [7, 8]            // Match for 3rd place
      ]
    ]
  ]
}


$('.demo').bracket({
  init: singleElimination
});
</script>
</body>
</html>



<!-- html sample header session -->

<span style="font-size:30px;cursor:pointer" onclick="openNav()" class="sideHide">&#9776; <!--open--></span>
<div class="sidenav" id="mySidenav">
  <nav>
    <a href="javascript:void(0)" class="closebtn sideHide sideOpen" onclick="closeNav()">&times;</a>
    <ul>
      
      <li class="header-li"><a href="home_ses_state.php"><i class="fa fa-home"></i></a></li>
        <li class="header-li"><a href="profile_ses_state.php"><i class="fa fa-user"></i></a></li>
      <li class="header-li"><a href="bskball_news_ses_state.php"><i class="fa fa-newspaper"></i></a></li>
      <li class="header-li hide-li4"><a href="post_court_ses_state.php"><i class="fa fa-location fa-color"></i></a></li>
      <li class="header-li hide-li1"><a href="findMatch_ses_state.php"><i class="fa fa-basketball"></i></a></li>
      <li class="header-li hide-li2"><a href="recruit_players_ses_state.php"><i class="fa fa-file"></i></a></li>
       <li class="header-li hide-li3"><a href="post_court_ses_state.php"><i class="fa fa-clipboard" aria-hidden="true"></i></a></li>
       <li class="header-li hide-li5"><a href="tournament_ses_state.php"><i class="fa fa-shield"></i></a></li>
        <li class="header-li hide-li6"><a href="tournament_events_ses_state.php"> <i class="fa fa-trophy" aria-hidden="true"></i></a></li>
       <li class="header-li"><a href="inbox_ses_state.php"><i class="fa fa-message"></i></a></li>
       <li class="header-li"><a href="inbox_player_ses_state.php"><i class="fa-regular fa-message"></i></a></li>
       <li class="header-li"><a href="call_ses_state.php"><i class="fas fa-video"></i></a></li>

      <!-- <li  class="header-li"><button><i class="material-icons">&#xe7f4;</i></button></li> -->
      <li style="float:right"><a href="logout.php" class=""><i class="fas fa-sign-out-alt"></i></a>
    </ul>

  </nav>
  </div>