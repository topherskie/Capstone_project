<?php require 'inc/header_ses.php'; ?>

<?php 
error_reporting(0);
$userIdno;
$userType;

$comPos = [];
$playerId = '';

// PG
$pts0 = 0;
$reb0 = 0;
$ast0 = 0;
$stl0 = 0;
$blk0 = 0;


//SG 
$pts1 = 0;
$reb1 = 0;
$ast1 = 0;
$stl1 = 0;
$blk1 = 0;


//SF
$pts2 = 0;
$reb2 = 0;
$ast2 = 0;
$stl2 = 0;
$blk2 = 0;


// C
$pts3 = 0;
$reb3 = 0;
$ast3 = 0;
$stl3 = 0;
$blk3 = 0;


// PF
$pts4 = 0;
$reb4 = 0;
$ast4 = 0;
$stl4 = 0;
$blk4 = 0;

if(isset($_GET['btnCompare'])) {
$playerId = $_GET['playerId'];
//$comPos = $_GET['comPos'];
 $playerId;
// echo $comPos[0];
// echo $comPos[1];
// echo $comPos[2];
// echo $comPos[3];
// echo $comPos[4];


// $resultCom0 = $comPos[0];
// $resultCom1 = $comPos[1];
// $resultCom2 = $comPos[2];
// $resultCom3 = $comPos[3];
// $resultCom4 = $comPos[4];


// PG
$sqlSub0 = "SELECT SUM(points) AS pts0, SUM(rebound) AS reb0, SUM(assist) AS ast0, SUM(steal) AS stl0, SUM(block) AS blk0, COUNT(event_id) AS event0 FROM player_portfolio WHERE user_id='$playerId' AND position='PG'";
$sqlQuerySub0 = mysqli_query($conn, $sqlSub0);
$resultSubs0 = mysqli_fetch_assoc($sqlQuerySub0);
$pts0 = $resultSubs0['pts0'] / $resultSubs0['event0'];
$reb0 = $resultSubs0['reb0'] / $resultSubs0['event0'];
$ast0 = $resultSubs0['ast0'] / $resultSubs0['event0'];
$stl0 = $resultSubs0['stl0'] / $resultSubs0['event0'];
$blk0 = $resultSubs0['blk0'] / $resultSubs0['event0'];


//echo"this is 0 - ". $pts0;


// SG
$sqlSub1 = "SELECT SUM(points) AS pts1, SUM(rebound) AS reb1, SUM(assist) AS ast1, SUM(steal) AS stl1, SUM(block) AS blk1, COUNT(event_id) AS event1 FROM player_portfolio WHERE user_id='$playerId' AND position='SG'";
$sqlQuerySub1 = mysqli_query($conn, $sqlSub1);
$resultSubs1 = mysqli_fetch_assoc($sqlQuerySub1);
$pts1 = $resultSubs1['pts1'] / $resultSubs1['event1'];
$reb1 = $resultSubs1['reb1'] / $resultSubs1['event1'];
$ast1 = $resultSubs1['ast1'] / $resultSubs1['event1'];
$stl1 = $resultSubs1['stl1'] / $resultSubs1['event1'];
$blk1 = $resultSubs1['blk1'] / $resultSubs1['event1'];
echo "<br>";
//echo "this is 1 - ". $pts1;



// SF
$sqlSub2 = "SELECT SUM(points) AS pts2, SUM(rebound) AS reb2, SUM(assist) AS ast2, SUM(steal) AS stl2, SUM(block) AS blk2, COUNT(event_id) AS event2 FROM player_portfolio WHERE user_id='$playerId' AND position='SF'";
$sqlQuerySub2 = mysqli_query($conn, $sqlSub2);
$resultSubs2 = mysqli_fetch_assoc($sqlQuerySub2);
$pts2 = $resultSubs2['pts2'] / $resultSubs2['event2'];
$reb2 = $resultSubs2['reb2'] / $resultSubs2['event2'];
$ast2 = $resultSubs2['ast2'] / $resultSubs2['event2'];
$stl2 = $resultSubs2['stl2'] / $resultSubs2['event2'];
$blk2 = $resultSubs2['blk2'] / $resultSubs2['event2'];
//echo "<br>";
//echo "this is 2 - ". $pts2;





// C
$sqlSub3 = "SELECT SUM(points) AS pts3, SUM(rebound) AS reb3, SUM(assist) AS ast3, SUM(steal) AS stl3, SUM(block) AS blk3, COUNT(event_id) AS event3 FROM player_portfolio WHERE user_id='$playerId' AND position='C'";
$sqlQuerySub3 = mysqli_query($conn, $sqlSub3);
$resultSubs3 = mysqli_fetch_assoc($sqlQuerySub3);
$pts3 = $resultSubs3['pts3'] / $resultSubs3['event3'];
$reb3 = $resultSubs3['reb3'] / $resultSubs3['event3'];
$ast3 = $resultSubs3['ast3'] / $resultSubs3['event3'];
$stl3 = $resultSubs3['stl3'] / $resultSubs3['event3'];
$blk3 = $resultSubs3['blk3'] / $resultSubs3['event3'];
//echo "<br>";
//echo "this is 3 - ". $pts3;






// PF
$sqlSub4 = "SELECT SUM(points) AS pts4, SUM(rebound) AS reb4, SUM(assist) AS ast4, SUM(steal) AS stl4, SUM(block) AS blk4, COUNT(event_id) AS event4 FROM player_portfolio WHERE user_id='$playerId' AND position='PF'";
$sqlQuerySub4 = mysqli_query($conn, $sqlSub4);
$resultSubs4 = mysqli_fetch_assoc($sqlQuerySub4);
$pts4 = $resultSubs4['pts4'] / $resultSubs4['event4'];
$reb4 = $resultSubs4['reb4'] / $resultSubs4['event4'];
$ast4 = $resultSubs4['ast4'] / $resultSubs4['event4'];
$stl4 = $resultSubs4['stl4'] / $resultSubs4['event4'];
$blk4 = $resultSubs4['blk4'] / $resultSubs4['event4'];
//echo "<br>";
//echo "this is 4 - ". $pts4;
}// END OF btnCompare






// tomorrow continue for this
 ?>

 <style type="text/css">
     .chart-compare {
        width: 60%;
        margin: auto;
        box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;
        padding: 12px;
     }
 @media only screen and (max-width: 600px) {
  .chart-compare {
      width: 100%;
  }
}

 </style>






  <div class="chart-compare">
      <div>
          <h4>Player Stats base on player position:</h4>
      </div>
      <div id="bar-example" style="height: 250px;"></div>
  </div>






<script type="text/javascript">
let pts0 =  "<?php echo round($pts0, 2); ?>";
let reb0 =  "<?php echo round($reb0, 2); ?>";
let ast0 =  "<?php echo round($ast0, 2); ?>";
let stl0 =  "<?php echo round($stl0, 2); ?>";
let blk0 =  "<?php echo round($blk0, 2); ?>";
if(isNaN(pts0) || isNaN(reb0) || isNaN(ast0) || isNaN(stl0) || isNaN(blk0)) {
    pts0 = 0;
    reb0 = 0;
    ast0 = 0;
    stl0 = 0;
    blk0 = 0;
} 



let pts1 =  "<?php echo round($pts1, 2); ?>";
let reb1 =  "<?php echo round($reb1, 2); ?>";
let ast1 =  "<?php echo round($ast1, 2); ?>";
let stl1 =  "<?php echo round($stl1, 2); ?>";
let blk1 =  "<?php echo round($blk1, 2); ?>";
if(isNaN(pts1) || isNaN(reb1) || isNaN(ast1) || isNaN(stl1) || isNaN(blk1)) {
    pts1 = 0;
    reb1 = 0;
    ast1 = 0;
    stl1 = 0;
    blk1 = 0;
} 



let pts2 =  "<?php echo round($pts2, 2); ?>";
let reb2 =  "<?php echo round($reb2, 2); ?>";
let ast2 =  "<?php echo round($ast2, 2); ?>";
let stl2 =  "<?php echo round($stl2, 2); ?>";
let blk2 =  "<?php echo round($blk2, 2); ?>";
if(isNaN(pts2) || isNaN(reb2) || isNaN(ast2) || isNaN(stl2) || isNaN(blk2)) {
    pts2 = 0;
    reb2 = 0;
    ast2 = 0;
    stl2 = 0;
    blk2 = 0;
} 



let pts3 =  "<?php echo round($pts3, 2); ?>";
let reb3 =  "<?php echo round($reb3, 2); ?>";
let ast3 =  "<?php echo round($ast3, 2); ?>";
let stl3 =  "<?php echo round($stl3, 2); ?>";
let blk3 =  "<?php echo round($blk3, 2); ?>";
if(isNaN(pts3) || isNaN(reb3) || isNaN(ast3) || isNaN(stl3) || isNaN(blk3)) {
    pts3 = 0;
    reb3 = 0;
    ast3 = 0;
    stl3 = 0;
    blk3 = 0;
} 



let pts4 =  "<?php echo round($pts4, 2); ?>";
let reb4 =  "<?php echo round($reb4, 2); ?>";
let ast4 =  "<?php echo round($ast4, 2); ?>";
let stl4 =  "<?php echo round($stl4, 2); ?>";
let blk4 =  "<?php echo round($blk4, 2); ?>";
if(isNaN(pts4) || isNaN(reb4) || isNaN(ast4) || isNaN(stl4) || isNaN(blk4)) {
    pts4 = 0;
    reb4 = 0;
    ast4 = 0;
    stl4 = 0;
    blk4 = 0;
} 





console.log(pts0);
console.log(reb0);
console.log(ast0);
console.log(stl0);
console.log(pts0);

console.log(pts1);
console.log(reb1);
console.log(ast1);
console.log(stl1);
console.log(pts1);






  /*
 * Play with this code and it'll update in the panel opposite.
 *
 * Why not try some of the options above?
 */
Morris.Bar({
  element: 'bar-example',
  data: [
    { y: 'Points',  a: pts0,  b: pts1, c: pts2, d: pts3, e: pts4 },
    { y: 'Rebound', a: reb0,  b: reb1, c: reb2, d: reb3, e: reb4 },
    { y: 'Assist',  a: ast0,  b: ast1, c: ast2, d: ast3, e: ast4 },
    { y: 'Steal',   a: stl0,  b: stl1, c: stl2, d: stl3, e: stl4 },
    { y: 'Block',   a: blk0,  b: blk1, c: blk2, d: blk3, e: blk4 },
  ],
  xkey: 'y',
  ykeys: ['a', 'b', 'c', 'd', 'e'],
  labels: ['Point Guard', 'Shooting Guard', 'Small Forward', 'Center', 'Power Forward']
});

</script>