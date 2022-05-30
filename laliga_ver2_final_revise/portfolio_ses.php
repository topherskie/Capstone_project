<?php require 'inc/header_ses.php'; ?>

<?php
error_reporting(0);
 $userIdno;

$avgPts = "";
$avgBlk = "";
$avgAst = "";
$avgReb = "";
$avgStl = "";
// query all stats
 $portData = "SELECT * FROM player_portfolio WHERE user_id='$userIdno'";
 $portQuery = mysqli_query($conn, $portData);

// totalCount  points
 $totalPtsCount = "SELECT COUNT(points) AS totalPtsCount FROM player_portfolio WHERE user_id='$userIdno'";
 $queryTotalPtsCount = mysqli_query($conn, $totalPtsCount);
 $resultTotalPtsCount = mysqli_fetch_assoc($queryTotalPtsCount);
 $resultTotalPtsCount['totalPtsCount'];

// sum points
 $totalPts = "SELECT SUM(points) AS totalPts FROM player_portfolio WHERE user_id='$userIdno'";
 $queryTotalPts = mysqli_query($conn, $totalPts);
 $resultTotalPts = mysqli_fetch_assoc($queryTotalPts);
 $resultTotalPts['totalPts'];


// total average points
 $avgPts = $resultTotalPts['totalPts'] / $resultTotalPtsCount['totalPtsCount'];



// totalCount block
 $totalBlock = "SELECT COUNT(block) AS totalBlockCount FROM player_portfolio WHERE user_id='$userIdno'";
 $queryTotalBlock = mysqli_query($conn, $totalBlock);
 $resultTotalBlock = mysqli_fetch_assoc($queryTotalBlock);
$resultTotalBlock['totalBlockCount'];



// total block sum
$totalBlock = "SELECT SUM(block) AS totalBlockSum FROM player_portfolio WHERE user_id='$userIdno'";
 $queryBlock= mysqli_query($conn, $totalBlock);
 $resultBlock = mysqli_fetch_assoc($queryBlock);
 $resultBlock['totalBlockSum'];

$avgBlk = $resultBlock['totalBlockSum'] / $resultTotalBlock['totalBlockCount'];




// assist
$totalAst = "SELECT COUNT(assist) AS totalAstCount FROM player_portfolio WHERE user_id='$userIdno'";
 $queryAst = mysqli_query($conn, $totalAst);
 $resultAst = mysqli_fetch_assoc($queryAst);
$resultAst['totalAstCount'];



// total assist sum
$totalAstSum = "SELECT SUM(assist) AS totalAssistSum FROM player_portfolio WHERE user_id='$userIdno'";
 $queryAstSum = mysqli_query($conn, $totalAstSum);
 $resultAstSum = mysqli_fetch_assoc($queryAstSum);
 $resultAstSum['totalAssistSum'];
 $avgAst = $resultAstSum['totalAssistSum'] / $resultAst['totalAstCount'];




// rebound count
$totalRebSum = "SELECT COUNT(rebound) AS totalReb FROM player_portfolio WHERE user_id='$userIdno'";
 $queryReb = mysqli_query($conn, $totalRebSum);
 $resultRebCount = mysqli_fetch_assoc($queryReb);
$resultRebCount['totalReb'];



// rebound sum
 $totalReb = "SELECT SUM(rebound) AS totalRebSum FROM player_portfolio WHERE user_id='$userIdno'";
 $queryReb = mysqli_query($conn, $totalReb);
 $resultRebSum = mysqli_fetch_assoc($queryReb);
 $resultRebSum['totalRebSum'];


$avgReb = $resultRebSum['totalRebSum'] / $resultRebCount['totalReb'];





// steal
$totalSteal = "SELECT COUNT(steal) AS totalSteal FROM player_portfolio WHERE user_id='$userIdno'";
$queryStl = mysqli_query($conn, $totalSteal);
$resultStl = mysqli_fetch_assoc($queryStl);
$resultStl['totalSteal'];



// rebound Steal
 $totalstl = "SELECT SUM(steal) AS totalStlSum FROM player_portfolio WHERE user_id='$userIdno'";
 $queryStlSum = mysqli_query($conn, $totalstl);
 $resultStlSum = mysqli_fetch_assoc($queryStlSum);
 $resultStlSum['totalStlSum'];

$avgStl =  $resultStlSum['totalStlSum'] / $resultStl['totalSteal'];



  ?>

<style type="text/css">
	.port-main-container {
		text-align: center;
	}

	.pos-design {
		display: flex;

	}
	.child-pos {
		margin:8px;
	}

  .port-card-info {
    width:  80%;
    margin: auto;
    padding: 12px;
   box-shadow: rgba(0, 0, 0, 0.25) 0px 0.0625em 0.0625em, rgba(0, 0, 0, 0.25) 0px 0.125em 0.5em, rgba(255, 255, 255, 0.1) 0px 0px 0px 1px inset;
  }

 .port-render-container {
  box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
  padding: 6px;
  margin: auto;
  width: 80%;
 }

 .tab-des {
  color: gray;
 }

 .btn-a {
  display: flex;
 }

 .btn-child {
  margin: 4px;
 }

 .chart-container {
  box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;
  width: 70%;
  margin: auto;
 }

@media only screen and (max-width: 500px) {
  .port-render-container {
    width: 100%;
  }
}

</style>
<br>



<div class="port-main-container">
	<div>
		<button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal">
  				Add Portfolio Data
		</button>
	</div>
</div>



<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Portfolio Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

       <form action="portfolio_ses_server.php" method="POST" enctype="multipart/form-data">
       		<input type="hidden" name="userIdno" value="<?php echo $userIdno; ?>">
       		<br>
       		<label>Event date</label>
       		<input type="date" name="eventDate" class="form-control">
       		<br>
       		<label>Event name</label>
       		<input type="text" name="eventName" class="form-control">
       		<br>
       		<label>Points</label>
       		<input type="number" name="pts" class="form-control">
       		<br>
       		<label>Rebound</label>
       		<input type="number" name="reb" class="form-control">
       		<br>
       		<label>Assist</label>
       		<input type="number" name="ast" class="form-control">
       		<br>
       		<label>Steal</label>
       		<input type="number" name="stl" class="form-control">
       		<br>
       		<label>Block</label>
       		<input type="number" name="blk" class="form-control">
       		<br>
       		<label>Position</label>
       		<div class="pos-design">

          <select name="pos" class="form-control">
            <option value="PG">PG</option>
            <option value="SG">SG</option>
            <option value="SF">SF</option>
            <option value="C">C</option>
            <option value="PF">PF</option>
          </select>
       	
       		</div>
       		<br>
       		<label>Game Award</label>
       		<select name="gameAward" class="form-control">
             <option value="MVP">NA</option>
              <option value="MVP">MVP</option>
              <option value="Rookie of the year">Rookie of the year</option>
              <option value="Rising Star">Rising Star</option>
              <option value="Defensive player of the year">Defensive player of the year</option>
          </select>
       		<br>
       		<label>Certificate</label>
       		<input type="file" name="eventCert" class="form-control">
       		<br>
          


            <input type="hidden" name="userIdno" value="<?php echo $userIdno; ?>">
       		<input type="submit" name="btnPort" value="Save" class="btn btn-outline-primary">
       </form>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



<!-- chart -->
<br>
<div class="chart-container animate__animated animate__backInLeft">
  <label>Overall average stats </label>
  <div id="basketballStat" style="height: 250px;"></div>

</div>

<!-- render data  -->
<br>
<div class="port-render-container animate__animated animate__backInRight" style="overflow-x: auto;">

  <table class="tab-des table table-hover">
  <thead>
    <tr>
      <th scope="col">Event name</th>
      <th scope="col">Event date</th>
      <th scope="col">Points</th>
      <th scope="col">Rebound</th>
      <th scope="col">Assist</th>
      <th scope="col">Steal</th>
      <th scope="col">Block</th>
      <th scope="col">Position</th>
      <th scope="col">Game award</th>
      <th scope="col">Gallery</th>
      <th scope="col">Certificate</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php  while($portRow = $portQuery->fetch_assoc()): ?>
    <tr>
      <th scope="row"><?php echo $portRow['event_name']; ?></th>
      <td><?php echo $portRow['event_date']; ?></td>
      <td><?php echo $portRow['points']; ?></td>
      <td><?php echo $portRow['rebound']; ?></td>
      <td><?php echo $portRow['assist']; ?></td>
      <td><?php echo $portRow['steal']; ?></td>
      <td><?php echo $portRow['block']; ?></td>
      <td><?php echo $portRow['position']; ?></td>
      <td><?php echo $portRow['game_award']; ?></td>
      <td>
        <form action="port_gallery_ses.php" method="GET">
          <input type="hidden" name="eventId" value="<?php echo $portRow['event_id']; ?>" >
          <input type="hidden" name="userId" value="<?php echo $portRow['user_id']; ?>">
          <input type="submit" name="btnGal" value="Gallery" class="btn btn-outline-secondary">
        </form>
      </td>
      <td>
        <div class="btn-a">

          <div class="btn-child">
            <a href="<?php echo "certificate/".$portRow['certificate']; ?>" target="_blank" class="btn btn-outline-secondary">View</a>
          </div>


          <div class="btn-child">
             <a href="<?php echo "certificate/".$portRow['certificate']; ?>" download class="btn btn-outline-secondary">Download</a>
          </div>

        </div>

      </td>
      <td>

        <div class="btn-a">

          <div class="btn-child">
            <form method="GET" action="portfolio_ses_server.php">
              <input type="hidden" name="evenId" value="<?php echo $portRow['event_id']; ?>">
              <input type="submit" name="btnDelPort" class="btn btn-outline-danger" value="X">
        </form>
          </div>
          
          <div class="btn-child">
          <form method="GET" action="portfolio_edit_ses.php">
            <input type="hidden" name="eventName" value="<?php echo $portRow['event_name']; ?>">
            <input type="hidden" name="eventDate" value="<?php echo $portRow['event_date']; ?>">
            <input type="hidden" name="pts" value="<?php echo $portRow['points']; ?>">
            <input type="hidden" name="reb" value="<?php echo $portRow['rebound']; ?>">
            <input type="hidden" name="ast" value="<?php echo $portRow['assist']; ?>">
            <input type="hidden" name="stl" value="<?php echo $portRow['steal']; ?>">
            <input type="hidden" name="blk" value="<?php echo $portRow['block']; ?>">
            <input type="hidden" name="pos" value="<?php echo $portRow['position']; ?>">
            <input type="hidden"  name="gameAward" value="<?php echo $portRow['game_award']; ?>">
            <input type="hidden" name="eventId" value="<?php echo $portRow['event_id']; ?>">
          <input type="submit" name="btnEdit" class="btn btn-outline-dark" value="Edit">
        </form>
          </div>

        </div>

      </td>
    </tr>
  <?php endwhile; ?>
  </tbody>
</table>

</div>


</div>



<!-- graph sample -->



<script type="text/javascript" defer>
let avgPts = 0;
let avgBlk = 0;
let avgAst = 0;
let avgReb = 0;
let avgStl = 0;

 avgPts = "<?php echo $avgPts; ?>";
 avgBlk = "<?php echo $avgBlk; ?>";
 avgAst = "<?php echo $avgAst; ?>";
 avgReb = "<?php echo $avgReb; ?>";
 avgStl = "<?php echo $avgStl; ?>";

console.log(avgPts);

  new Morris.Bar({
  // ID of the element in which to draw the chart.
  element: 'basketballStat',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: [
    { year: 'Points', value: parseFloat(avgPts).toFixed(2) },
    { year: 'Block', value: parseFloat(avgBlk).toFixed(2) },
    { year: 'Assist', value: parseFloat(avgAst).toFixed(2) },
    { year: 'Rebound', value: parseFloat(avgReb).toFixed(2) },
    { year: 'Steal', value: parseFloat(avgStl).toFixed(2) }
  ],
  // The name of the data record attribute that contains x-values.
  xkey: 'year',
  // A list of names of data record attributes that contain y-values.
  ykeys: ['value'],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['Value']
});
</script>








<?php require 'inc/footer.php'; ?>
