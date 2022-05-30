
<?php require 'inc/header_ses.php'; ?>
<?php 

$userIdno;
$userType;
 $userName;
$userEmail;
$userFirstname;
$userLastname;
$userAddress;
$userDob;


$portId = '';
$portData = "SELECT * FROM player_portfolio WHERE user_id='$userIdno'";
 $portQuery = mysqli_query($conn, $portData);
 
if(isset($_GET['portId'])) {
$portId = $_GET['portId'];
$portData = "SELECT * FROM player_portfolio WHERE user_id='$portId'";
$portQuery = mysqli_query($conn, $portData);
 




} // END OF portId


// totalCount  points
 $totalPtsCount = "SELECT COUNT(points) AS totalPtsCount FROM player_portfolio WHERE user_id='$portId'";
 $queryTotalPtsCount = mysqli_query($conn, $totalPtsCount);
 $resultTotalPtsCount = mysqli_fetch_assoc($queryTotalPtsCount);
 $resultTotalPtsCount['totalPtsCount'];

// sum points
 $totalPts = "SELECT SUM(points) AS totalPts FROM player_portfolio WHERE user_id='$portId'";
 $queryTotalPts = mysqli_query($conn, $totalPts);
 $resultTotalPts = mysqli_fetch_assoc($queryTotalPts);
 $resultTotalPts['totalPts'];


// total average points
 $avgPts = $resultTotalPts['totalPts'] / $resultTotalPtsCount['totalPtsCount'];



// totalCount block
 $totalBlock = "SELECT COUNT(block) AS totalBlockCount FROM player_portfolio WHERE user_id='$portId'";
 $queryTotalBlock = mysqli_query($conn, $totalBlock);
 $resultTotalBlock = mysqli_fetch_assoc($queryTotalBlock);
$resultTotalBlock['totalBlockCount'];
  


// total block sum
$totalBlock = "SELECT SUM(block) AS totalBlockSum FROM player_portfolio WHERE user_id='$portId'";
 $queryBlock= mysqli_query($conn, $totalBlock);
 $resultBlock = mysqli_fetch_assoc($queryBlock);
 $resultBlock['totalBlockSum'];

$avgBlk = $resultBlock['totalBlockSum'] / $resultTotalBlock['totalBlockCount'];




// assist
$totalAst = "SELECT COUNT(assist) AS totalAstCount FROM player_portfolio WHERE user_id='$portId'";
 $queryAst = mysqli_query($conn, $totalAst);
 $resultAst = mysqli_fetch_assoc($queryAst);
$resultAst['totalAstCount'];



// total assist sum
$totalAstSum = "SELECT SUM(assist) AS totalAssistSum FROM player_portfolio WHERE user_id='$portId'";
 $queryAstSum = mysqli_query($conn, $totalAstSum);
 $resultAstSum = mysqli_fetch_assoc($queryAstSum);
 $resultAstSum['totalAssistSum'];
 $avgAst = $resultAstSum['totalAssistSum'] / $resultAst['totalAstCount'];




// rebound COUNT
$totalSum = "SELECT COUNT(rebound) AS totalRebSum FROM player_portfolio WHERE user_id='$portId'";
 $queryReb = mysqli_query($conn, $totalSum);
 $resultRebSum = mysqli_fetch_assoc($queryReb);
$resultRebSum['totalRebSum'];



// rebound sum
 $totalReb = "SELECT SUM(rebound) AS totalRebCount FROM player_portfolio WHERE user_id='$portId'";
 $queryReb = mysqli_query($conn, $totalReb);
 $resultCount = mysqli_fetch_assoc($queryReb);
 $resultCount['totalRebCount'];


$avgReb = $resultCount['totalRebCount'] / $resultRebSum['totalRebSum'];





// steal
$totalSteal = "SELECT COUNT(steal) AS totalSteal FROM player_portfolio WHERE user_id='$portId'";
$queryStl = mysqli_query($conn, $totalSteal);
$resultStl = mysqli_fetch_assoc($queryStl);
$resultStl['totalSteal'];



// rebound Steal
 $totalstl = "SELECT SUM(steal) AS totalStlSum FROM player_portfolio WHERE user_id='$portId'";
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

.btn-compare-container {
  text-align: center;

}

@media only screen and (max-width: 500px) {
  .port-render-container {
    width: 100%;
  }
}

</style>
<br>


<!-- chart -->
<br>
<div class="chart-container animate__animated animate__backInLeft">
  <label>Overall average stats </label>
  <div id="basketballStat" style="height: 250px;"></div>

</div>
<br>  
<div class="btn-compare-container">
  <div>
    <form action="view_pos_chart_ses.php" method="GET" clas="form-group">
      <input type="hidden" name="playerId" value="<?php echo $portId; ?>">
      <br>
      <input type="submit" name="btnCompare" value="Compare Stats" class="btn btn-outline-primary">
    </form>
  </div>
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
      <td>
        <?php echo $portRow['position']; ?>
    </td>
      <td><?php echo $portRow['game_award']; ?></td>
      <td>
        <form action="view_gallery_ses.php" method="GET">
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
            
          </div>
          
          <div class="btn-child">
         
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



<script type="text/javascript">
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
