<?php include 'inc/header_login_state.php'; ?>
<?php
 // echo  $sesIdno . "<BR>";
 //  echo $sesUser . "<BR>";;
 //  echo  $sesUserType . "<BR>";
 //  echo $sesFname;
 //  echo $sesLname;

$data = '';
$newArray = [];
if(isset($_POST['btnStart'])) {
    $eventPromoIdno = $_POST['eventPromoIdno'];

    $sqlRetrieveGame = "SELECT * FROM teams WHERE user_idno='$sesIdno' AND event_idno='$eventPromoIdno'";
    $resultRetrieveGame = $conn->query($sqlRetrieveGame);




    while($rowTeams = mysqli_fetch_assoc($resultRetrieveGame)) {

        array_push($newArray, $rowTeams);

    }

} // end of main ifelse

// echo "<br>";
// echo $newArray[0]['team_name'];
// echo $newArray[0]['team_score'];
// echo "<br>";
// echo $newArray[1]['team_name'];
// echo $newArray[1]['team_score'];
// echo "<br>";
// echo $newArray[2]['team_name'];
// echo $newArray[2]['team_score'];
// echo "<br>";
// echo $newArray[3]['team_name'];
// echo $newArray[3]['team_score'];


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="dist/jquery.bracket.min.js"></script>
    <link href="dist/jquery.bracket.min.css" rel="stylesheet">
    <title>Bracket Testnet</title>
    <style media="screen">
      .main-bracket-container {
        text-align: center;
        border: 2px solid black;
        padding: 25px;
        margin: 12px;
        display:flex;
        justify-content: center;

      }

      .demo-container {
          border: 2px solid black;
          padding: 12px;
          margin: 6px;
      }

      .demo2-container {
          border: 2px solid black;
          padding: 12px;
          margin: 6px;
      }






      /* RESPONSIVE */
      @media screen and (max-width: 480px) {
  .main-bracket-container {
    display: block;
  }
}

    </style>
</head>
<body>

  <!-- render bracket  -->
  <div class="">
    <button type="button" id="btnUpdateBracket" name="button" class="btn btn-outline-primary">Update Bracket</button>
    <button type="button" id="btnFinals" class="btn btn-outline-primary">Final Score</button>
  </div>
   <div class="main-bracket-container">
       <div class="demo demo-container" id="resize">

       </div>

       <div class="demo2-container">
            <label for=""><?php echo $newArray[0]['team_name']; ?></label>
            <br>
           <input type="number" name="" id="txtScore0" value="">
           <br>
           <label for=""><?php echo $newArray[1]['team_name']; ?></label>
           <br>
           <input type="number" name="" id="txtScore1" value="">
           <br><br>
           <label for=""><?php echo $newArray[2]['team_name']; ?></label>
           <br>
           <input type="number" name="" id="txtScore2" value="">
           <br>
           <label for=""><?php echo $newArray[3]['team_name']; ?></label>
           <br>
           <input type="number" name="" id="txtScore3" value="">
       </div>



   </div>








<script type="text/javascript" defer>
const userIdno = "<?php echo $sesIdno; ?>";
const eventIdno = "<?php echo $newArray[0]['event_idno']; ?>";
const btnUpdateBracket = document.getElementById("btnUpdateBracket");
const btnFinals = document.getElementById("btnFinals");
const team0 = "<?php echo $newArray[0]['team_name']; ?>";
const team1 = "<?php echo $newArray[1]['team_name']; ?>";
const team2 = "<?php echo $newArray[2]['team_name']; ?>";
const team3 = "<?php echo $newArray[3]['team_name']; ?>";

// SCORES
let score0 = parseInt("<?php echo $newArray[0]['team_score']; ?>");
let score1 = parseInt("<?php echo $newArray[1]['team_score']; ?>");
let score2 = parseInt("<?php echo $newArray[2]['team_score']; ?>");
let score3 = parseInt("<?php echo $newArray[3]['team_score']; ?>");
//console.log(team0, team1, team2, team3);
//console.log(score0, score1, score2, score3);

let numScore0;
let txtScore0 = document.getElementById("txtScore0");
let txtScore1 = document.getElementById("txtScore1")
let txtScore2 = document.getElementById("txtScore2")
let txtScore3 = document.getElementById("txtScore3")
parseInt(txtScore0);



let scoreFinal = [];
btnUpdateBracket.addEventListener("click", function() {
 eventData(txtScore0.value, txtScore1.value, txtScore2.value, txtScore3.value);

});



function eventData(a, b, c, d) {
  scoreFinal.length = 0;
let semi1 = 142;
let semi2 = 9;

// to hold the value of winner
let testNo1 = 0;
let testNo2 = 0;





  var singleElimination = {
      teams : [
        [team0, team1], /* first matchup */
        [team2 , team3]  /* second matchup */
      ],
      results : [
        [[parseInt(a), parseInt(b)], [parseInt(c), parseInt(d)]],       /* first round */
        [[testNo1, testNo2], [0,0]]        /* second round */
      ]
    }



    if (parseInt(a) > parseInt(b)) {
      testNo1 = parseInt(a);
      scoreFinal.push(singleElimination.teams[0][0], testNo1);
    } else if (parseInt(b) > parseInt(a)) {
      testNo1 = parseInt(b);
      scoreFinal.push(singleElimination.teams[0][1], testNo1);

    }

     if (parseInt(c) > parseInt(d)) {
       testNo2 = parseInt(c);
       scoreFinal.push(singleElimination.teams[1][0], testNo2);

    } else if (parseInt(d) > parseInt(c)) {
      testNo2 = parseInt(d);
       scoreFinal.push(singleElimination.teams[1][1], testNo2);

    }


  $(function() {
      $('.demo').bracket({
        init: singleElimination /* data to initialize the bracket with */ })
    })

      // console.log(singleElimination.teams[1][0]);
      //       console.log(singleElimination.teams[1][1]);

btnFinals.disabled = false;
} // END OF EVENTDATA






// saving the state of an array
btnFinals.addEventListener("click", function() {
let finalData = scoreFinal;

  console.log(finalData)
  btnFinals.disabled = true;

console.log(finalData[0], finalData[1]);
console.log(finalData[2], finalData[3]);

  $.post("tournament_bracket_post_state.php", {

      teamName1: finalData[0],
      teamScore2: finalData[1],
      teamName3: finalData[2],
      teamScore4: finalData[3],
      teamStatus: "TBD",
      userIdno: userIdno,
      eventIdno: eventIdno,



    },
    function(data, status){
     alert("Data: " + data + "\nStatus: " + status);
    });


}) // END OF BTNFINALS




// console.log(userIdno, eventIdno);


// $("input").click(function(){
//   var txt = $("input").val();
//   $.post("tournament_post_score.php", {
//     suggest: txt

//     }, function(result){
//     $("span").html(result);
//   });
// });



</script>

<?php include 'inc/footer.php'; ?>
