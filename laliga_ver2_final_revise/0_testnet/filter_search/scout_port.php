<?php require 'db.php'; ?>

<?php 
$queryAvg = "";
$viewAvg = "";
// default state
$viewAvg = "SELECT * FROM player_port_avg";
$queryAvg = mysqli_query($conn, $viewAvg);

$userId='';
if(isset($_GET['btnSearch'])) {
$userId = $_GET['userId'];
$viewAvg = "SELECT * FROM player_port_avg WHERE avg_pos='$userId' OR avg_pts < 29";
$queryAvg = mysqli_query($conn, $viewAvg);


} // END OF SEARCH

 ?>




    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-3">
                    <div class="card-header">
                        <h4>Scout Players</h4>
                    </div>
                </div>
            </div>

            <!-- Brand List  -->
            <div class="col-md-3">
                <form action="" method="GET">
                    <div class="card shadow mt-3">
                        <div class="card-header">
                            <h4>Filter
                          
                            <form method="GET" action="">
                            <input type="text" name="userId">
                            <input type="submit" value="Search" name="btnSearch" class="btn btn-outline-primary btn-sm float-end">
                          </form>
                          
                            </h4>
                        </div>
                        <div class="card-body">
                            <h6>Player Position</h6>
                            <hr>
                          
                          <div>
                              <input type="button" name="">
                          </div>
                                  
                        </div>
                    </div>
                </form>
            </div>

            <!-- Brand Items - Products -->
            <div class="col-md-9 mt-3">
                <div class="card ">
                    <div class="card-body row">

                        <?php while($rowAvg = $queryAvg->fetch_assoc()): ?>
                                    <div class="col-md-4 mt-3">
                                        <div class="border p-2">
                                            <form>
                                                 <h6><?php echo $rowAvg['avg_fullname']; ?></h6>
                                                <h6><?php echo $rowAvg['avg_pts']; ?></h6>
                                                <h6>test</h6>
                                                </form>
                                        </div>
                                    </div>
            
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

   

