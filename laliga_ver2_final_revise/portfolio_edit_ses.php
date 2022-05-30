<?php require 'inc/header_ses.php'; ?>

<?php 

$eventName = '';
$eventDate = '';
$pts = ''; 
$reb = '';
$ast = '';
$stl = '';
$blk = '';
$pos = '';
$gameAward = '';
$eventId = '';
if(isset($_GET['btnEdit'])) {
$eventName = $_GET['eventName'];
$eventDate = $_GET['eventDate'];
$pts = $_GET['pts'];
$reb = $_GET['reb'];
$ast = $_GET['ast'];
$stl = $_GET['stl'];
$blk = $_GET['blk'];
$pos = $_GET['pos'];
$gameAward = $_GET['gameAward'];
$eventId = $_GET['eventId'];



} // END OF btnEdit

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

 .edit-con {
 	padding: 7px;
 	width: 50%;
 	margin: auto;
 	box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;
 }

@media only screen and (max-width: 500px) {
  .port-render-container {
    width: 100%;
  }
}

</style>
<br>
<div class="container edit-con animate__animated animate__backInDown">
	
	<div>
			
		 <form action="portfolio_ses_server.php" method="GET" enctype="multipart/form-data">
       		<input type="hidden" name="userIdno" value="<?php echo $userIdno; ?>">
       		<br>
       		<label>Event date</label>
       		<input type="date" name="eventDate" class="form-control" value="<?php echo $eventDate; ?>">
       		<br>
       		<label>Event name</label>
       		<input type="text" name="eventName" class="form-control" value="<?php echo $eventName; ?>">
       		<br>
       		<label>Points</label>
       		<input type="number" name="pts" class="form-control" value="<?php echo $pts; ?>">
       		<br>
       		<label>Rebound</label>
       		<input type="number" name="reb" class="form-control" value="<?php echo $reb; ?>">
       		<br>
       		<label>Assist</label>
       		<input type="number" name="ast" class="form-control" value="<?php echo $ast; ?>">
       		<br>
       		<label>Steal</label>
       		<input type="number" name="stl" class="form-control" value="<?php echo $stl; ?>">
       		<br>
       		<label>Block</label>
       		<input type="number" name="blk" class="form-control" value="<?php echo $blk; ?>">
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
       		<select name="gameAward" class="form-control" value="<?php echo $gameAward; ?>">
            <option value="MVP">NA</option>
              <option value="MVP">MVP</option>
              <option value="Rookie of the year">Rookie of the year</option>
              <option value="Rising Star">Rising Star</option>
              <option value="Defensive player of the year">Defensive player of the year</option>
          </select>
       		<br>


       		<input type="hidden" name="eventId" value="<?php echo $eventId; ?>">
       		<input type="submit" name="btnPortEdit" value="Save Changes" class="btn btn-outline-primary">
       </form>	


	</div>

</div>





 <?php require 'inc/footer.php'; ?>