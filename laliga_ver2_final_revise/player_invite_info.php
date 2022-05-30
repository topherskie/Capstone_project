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


$rowInvites = '';
// query the invites in table 
$invites = "SELECT * FROM player_invites WHERE player_id='$userIdno'";
$queryInvites = mysqli_query($conn, $invites);





 ?>

<style type="text/css">
.div-con {
	width:60%;
	padding: 12px;
	box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;
}

.desc-pad {
	padding:  12px;
}

.btn-dec-acc {
  display:flex;
}

.child-btn-dec-acc {
  padding: 12px;
  
}

@media only screen and (max-width: 600px) {
.div-con {
    width:50%;
  }
}

</style>

<br>

<div class="container div-con animate__animated animate__backInRight">
             
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Scout name</th>
        <th>Description</th>
        <th>Status</th>
       
      </tr>
    </thead>
    <tbody>

<?php while($rowInvites = $queryInvites->fetch_assoc()): ?>
      <?php if($rowInvites['invite_status'] == 'pending'): ?>
        <tr>
        <td><?php echo $rowInvites['scout_name']; ?></td>
        <td class="desc-pad">
          <p style="font-size:1.2vw;"><?php echo $rowInvites['invite_msg']; ?></p>
            <input type="hidden" name="" class="txtInviteId" value="<?php echo $rowInvites['invite_id']; ?>">
          </td>
          <td><?php echo $rowInvites['invite_status']; ?></td>
        <td>
          <div class="btn-dec-acc">

          <div class="child-btn-dec-acc">  
          <form action="player_invite_info_server.php" method="GET">
            <input type="hidden" name="playerId" value="<?php echo $rowInvites['player_id']; ?>">
            <input type="hidden" name="eventId" value="<?php echo $rowInvites['invite_id']; ?>">
           <input type="submit" name="btnAccept" value="Accept" class="btn btn-outline-primary btn-sm"> 
          </form>
          </div>

            <div class="child-btn-dec-acc"> <!-- decline btn send it to the decline history and delete the request -->
            <form action="player_invite_info_decline.php" method="GET">
              <input type="hidden" name="scoutId" value="<?php echo $rowInvites['scout_id']; ?>">
              <input type="hidden" name="playerPos" value="<?php echo $rowInvites['player_pos']; ?>">
              <input type="hidden" name="inviteMsg" value="<?php echo $rowInvites['invite_msg']; ?>">
              <input type="hidden" name="playerName" value="<?php echo $rowInvites['player_name']; ?>">
                <input type="hidden" name="scoutName" value="<?php echo $rowInvites['scout_name']; ?>">
                <input type="hidden" name="eventId" value="<?php echo $rowInvites['invite_id']; ?>">  
                <input type="hidden" name="playerId" value="<?php echo $rowInvites['player_id']; ?>">
               <input type="submit" name="btnDecline" value="Decline" class="btn btn-outline-danger btn-sm"> 
            </form>
          </div>

          <div>
        </td>
      </tr>

      <?php elseif($rowInvites['invite_status'] == 'recruited'): ?>
      <tr>
        <td><?php echo $rowInvites['scout_name']; ?></td>
        <td class="desc-pad">
          <p style="font-size:1.2vw;"><?php echo $rowInvites['invite_msg']; ?></p>
            <input type="hidden" name="" class="txtInviteId" value="<?php echo $rowInvites['invite_id']; ?>">
          </td>
          <td><?php echo $rowInvites['invite_status']; ?></td>
        <td>
          <form action="player_invite_info_quit.php" method="GET">
            <input type="hidden" name="scoutId" value="<?php echo $rowInvites['scout_id']; ?>">
              <input type="hidden" name="playerPos" value="<?php echo $rowInvites['player_pos']; ?>">
              <input type="hidden" name="inviteMsg" value="<?php echo $rowInvites['invite_msg']; ?>">
              <input type="hidden" name="playerName" value="<?php echo $rowInvites['player_name']; ?>">
                <input type="hidden" name="scoutName" value="<?php echo $rowInvites['scout_name']; ?>">
                <input type="hidden" name="eventId" value="<?php echo $rowInvites['invite_id']; ?>">  
                <input type="hidden" name="playerId" value="<?php echo $rowInvites['player_id']; ?>">
           <input type="submit" name="btnQuit" value="Leave" class="btn btn-outline-danger btn-sm"> 
          </form>
        </td>
      </tr>
    <?php elseif($rowInvites['invite_status'] == 'hired'): ?>
       <tr>
        <td><?php echo $rowInvites['scout_name']; ?></td>
        <td class="desc-pad">
          <p style="font-size:1.2vw;"><?php echo $rowInvites['invite_msg']; ?></p>
            <input type="hidden" name="" class="txtInviteId" value="<?php echo $rowInvites['invite_id']; ?>">
          </td>
          <td><?php echo $rowInvites['invite_status']; ?></td>
        <td>
          <form action="player_invite_info_quit.php" method="GET">
            <input type="hidden" name="scoutId" value="<?php echo $rowInvites['scout_id']; ?>">
              <input type="hidden" name="playerPos" value="<?php echo $rowInvites['player_pos']; ?>">
              <input type="hidden" name="inviteMsg" value="<?php echo $rowInvites['invite_msg']; ?>">
              <input type="hidden" name="playerName" value="<?php echo $rowInvites['player_name']; ?>">
                <input type="hidden" name="scoutName" value="<?php echo $rowInvites['scout_name']; ?>">
                <input type="hidden" name="eventId" value="<?php echo $rowInvites['invite_id']; ?>">  
                <input type="hidden" name="playerId" value="<?php echo $rowInvites['player_id']; ?>"> 
          </form>
        </td>
      </tr>
    <?php endif; ?>
<?php endwhile; ?>

    </tbody>
  </table>
</div>



<br>
<br>
<br>
<br>
<?php // require 'inc/footer.php'; ?>