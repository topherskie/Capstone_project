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


// select * player invits from player_invites tbl
$scoutInvites = "SELECT * FROM player_invites WHERE scout_id='$userIdno'";
$queryInviteScout = mysqli_query($conn, $scoutInvites);


 ?>
<style type="text/css">
	.con-des {
		box-shadow: rgba(0, 0, 0, 0.25) 0px 0.0625em 0.0625em, rgba(0, 0, 0, 0.25) 0px 0.125em 0.5em, rgba(255, 255, 255, 0.1) 0px 0px 0px 1px inset;
		padding: 12px;
		width: 60%;
	}

  .table-tb {
    display: flex;

  }

  .child-table-tb {
    margin: 7px;  
  }


	@media only screen and (max-width: 600px) {
  .con-des {
   width: 100%;
  }
}

</style>
<br>

<div class="container con-des animate__animated animate__backInUp" style="overflow-x: auto;">      
<div>
  <h5>Player Recruit List</h5>
</div>      
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Profile</th>
        <th>Player name</th>
        <th>Player Position</th>
        <th>Description</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
   <?php while($rowInvitesTo = $queryInviteScout->fetch_assoc()): ?> 	
     <?php if($rowInvitesTo['invite_status'] == 'recruited'): ?>
       <tr>
        <td><a href="<?php echo "view_port_ses.php?portId=".$rowInvitesTo['player_id']; ?>" target="_blank" class="btn btn-outline-primary">P</a></td>
        <td><a href="<?php echo "view_profile_ses.php?protId=".$rowInvitesTo['player_id']; ?>" target="_blank"><?php echo $rowInvitesTo['player_name']; ?></a></td>
        <td><?php echo $rowInvitesTo['player_pos']; ?></td>
        <td><?php echo $rowInvitesTo['invite_msg']; ?></td>
        <td><?php echo $rowInvitesTo['invite_status']; ?></td>
        <td>
         <div> 
          <div class="table-tb">
          
           <div class="child-table-tb">
            <form action="recruit_hired_server.php" method="GET">
              <input type="hidden" name="playerId" value="<?php echo $rowInvitesTo['player_id']; ?>">
              <input type="hidden" name="eventId" value="<?php echo $rowInvitesTo['invite_id']; ?>"> 
               <input type="submit" name="btnHired" class="btn btn-outline-primary btn-sm" value="Hire">  
            </form> 
          </div>

          <div class="child-table-tb"> 
              <form method="GET" action="recruit_dismiss_ses.php">
                <input type="hidden" name="scoutId" value="<?php echo $rowInvitesTo['scout_id']; ?>">
              <input type="hidden" name="playerPos" value="<?php echo $rowInvitesTo['player_pos']; ?>">
              <input type="hidden" name="playerName" value="<?php echo $rowInvitesTo['player_name']; ?>">
              <input type="hidden" name="inviteMsg" value="<?php echo $rowInvitesTo['invite_msg']; ?>">
                <input type="hidden" name="scoutName" value="<?php echo $rowInvitesTo['scout_name']; ?>">
                <input type="hidden" name="eventId" value="<?php echo $rowInvitesTo['invite_id']; ?>">  
                <input type="hidden" name="playerId" value="<?php echo $rowInvitesTo['player_id']; ?>">

 
              <input type="submit" name="btnDismiss" class="btn btn-outline-danger btn-sm" value="Dismiss">
              </form>
          </div>

    </div>
         </div> 
        </td>
      </tr>
    <?php elseif($rowInvitesTo['invite_status'] == 'pending'): ?>
    <tr>
        <td><a href="<?php echo "view_port_ses.php?portId=".$rowInvitesTo['player_id']; ?>" target="_blank" class="btn btn-outline-primary">P</a></td>
        <td><a href="<?php echo "view_profile_ses.php?protId=".$rowInvitesTo['player_id']; ?>" target="_blank"><?php echo $rowInvitesTo['player_name']; ?></a></td>
        <td><?php echo $rowInvitesTo['player_pos']; ?></td>
        <td><?php echo $rowInvitesTo['invite_msg']; ?></td>
        <td><?php echo $rowInvitesTo['invite_status']; ?></td>
        <td>
         <div> 
          <div></div>
          

          <div>
              <form method="GET" action="recruit_dismiss_ses.php">
                <input type="hidden" name="scoutId" value="<?php echo $rowInvitesTo['scout_id']; ?>">
              <input type="hidden" name="playerPos" value="<?php echo $rowInvitesTo['player_pos']; ?>">
              <input type="hidden" name="playerName" value="<?php echo $rowInvitesTo['player_name']; ?>">
              <input type="hidden" name="inviteMsg" value="<?php echo $rowInvitesTo['invite_msg']; ?>">
                <input type="hidden" name="scoutName" value="<?php echo $rowInvitesTo['scout_name']; ?>">
                <input type="hidden" name="eventId" value="<?php echo $rowInvitesTo['invite_id']; ?>">  
                <input type="hidden" name="playerId" value="<?php echo $rowInvitesTo['player_id']; ?>">

                  
              <input type="submit" name="btnDismiss" class="btn btn-outline-primary btn-sm" value="Dismiss">
              </form>
          </div>


         </div> 
        </td>
      </tr>
  <?php elseif($rowInvitesTo['invite_status'] == 'hired'): ?>

     <tr>
        <td><a href="<?php echo "view_port_ses.php?portId=".$rowInvitesTo['player_id']; ?>" target="_blank" class="btn btn-outline-primary">P</a></td>
        <td><a href="<?php echo "view_profile_ses.php?protId=".$rowInvitesTo['player_id']; ?>" target="_blank"><?php echo $rowInvitesTo['player_name']; ?></a></td>
        <td><?php echo $rowInvitesTo['player_pos']; ?></td>
        <td><?php echo $rowInvitesTo['invite_msg']; ?></td>
        <td><?php echo $rowInvitesTo['invite_status']; ?></td>
        <td>
         <div> 
          <div></div>
          

          <div>
              <form method="GET" action="recruit_dismiss_ses.php">
                <input type="hidden" name="scoutId" value="<?php echo $rowInvitesTo['scout_id']; ?>">
              <input type="hidden" name="playerPos" value="<?php echo $rowInvitesTo['player_pos']; ?>">
              <input type="hidden" name="playerName" value="<?php echo $rowInvitesTo['player_name']; ?>">
              <input type="hidden" name="inviteMsg" value="<?php echo $rowInvitesTo['invite_msg']; ?>">
                <input type="hidden" name="scoutName" value="<?php echo $rowInvitesTo['scout_name']; ?>">
                <input type="hidden" name="eventId" value="<?php echo $rowInvitesTo['invite_id']; ?>">  
                <input type="hidden" name="playerId" value="<?php echo $rowInvitesTo['player_id']; ?>">

                  
              <input type="submit" name="btnDismiss" class="btn btn-outline-danger btn-sm" value="Dismiss">
              </form>
          </div>


         </div> 
        </td>
      </tr>


    <?php endif; ?>
   <?php endwhile; ?>
    </tbody>
  </table>
</div>



