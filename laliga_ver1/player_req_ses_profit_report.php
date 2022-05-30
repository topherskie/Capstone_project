<?php 

require "configs/db.php";
require "configs/server.php"; 
$sesUserType = $_SESSION['user_type'];
$sesUser = $_SESSION['user_username'];
$sesIdno =  $_SESSION['user_idno'];
$sesFname = $_SESSION['user_fname'];
$sesLname = $_SESSION['user_lname'];

echo $sesIdno;
echo $sesUser;
echo $sesUserType;



// QUERY THE HISTORY RESERVATION TABLE
$sqlViewAllBookingRequest = "SELECT * FROM reservations_data_history INNER JOIN user ON reservations_data_history.user_idno=user.user_idno WHERE reservations_data_history.co_idno='$sesIdno'";
$resultViewAllBookingRequest = mysqli_query($conn, $sqlViewAllBookingRequest);

 ?>




 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<title>Profit Report</title>
  <style type="text/css">
    :root {
  --gray: #F5F6FA;
  --white: #FFFFFF;
  --fontColor: #A7ACB5;
  --darkFontColor: #333333;
  --green: #00CB4F;
  --blue: #3E84F9;
}

body {
  margin: 0;
  
  font-family: Montserrat;
  
  --webkit-font-smoothing: antialiased;
  text-rendering: optimizelegibility;
  text-shadow: none;
  font-weight: normal;
}

h1, .h2s {
  margin: 0;
  padding: 0;
/*  color: var(--darkFontColor);*/
  font-weight: normal;
}

p {
  margin: 0;
  padding: 0;
}

ul {
  /*list-style-type: none;*/
}



i {
/*  color: var(--fontColor);*/
}

#nav-container {
  display:flex;
  justify-content: center;
  align-items: center;
  height: 25px;
  
}

.navs {
  display: flex;
  justify-content: space-between;
  align-items: center;
  height: 75px;
  width: 80%;
}

.navs ul {
  display: flex;
}

.navs ul li {
  margin: 24px;
}

.navs ul li:first-of-type {
  /*color: var(--darkFontColor);*/
}

.navs .fa-bars {
  display: none;
}

.navs #mobile-menu {
  display: none;
}

main {
  width: 80%;
  margin: 0 auto;
}

section:first-of-type {
  display: flex;
  flex-direction: column;
  justify-content: space-around;
  height: 100px;
}

section:nth-of-type(2) {
  display: flex;
  justify-content: space-between;
  align-items: center;
  height: 200px;
}

section:nth-of-type(3) {
  height: 450px;
  border-radius: 4px;
}

.jobStatisticsDiv {
  display: flex;
  align-items: center;
  height: 150px;
  width: 30%;
  background-color: var(--white);
  border-radius: 4px;
}

.jobStatisticsDiv span {
  color: var(--fontColor);
  font-size: 12px;
}

.jobStatisticsDiv i {
  margin: 32px;
}

.jobStatisticsDiv:first-of-type i {
  color: var(--blue);
}

.jobStatisticsDiv:nth-of-type(2) i {
  color: var(--blue);
}

.jobStatisticsDiv:nth-of-type(3) i {
  color: var(--green);
}

#barChart {
  height: 100%;
  width: 100%;
  border-radius: 4px;
}

@media screen and (max-width: 700px) {
  main {
    display: flex;
    flex-direction: column;
    width: 80%;
    height: 1000px;
    margin: 0 auto;
    padding: 16px 0;
  }
  
  section:nth-of-type(1) {
    height: 100px;
  }
  
  section:nth-of-type(2) {
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    height: 500px;
  }
  
  section:nth-of-type(3) {
    height: 400px;
    margin-top: 16px;
  }

  .jobStatisticsDiv {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 150px;
    width: 100%;
    margin-top: 16px;
    background-color: var(--white);
    border-radius: 4px;
  }
}

@media screen and (max-width: 500px) {
  .navs {
    height: 75px;
  }
  .navs ul {
    display: none;
  }
  
  .navs img {
    display: none;
  }
  
  .navs .fa-bars {
    display: block;
    cursor: pointer;
  }
  
  .navs #mobile-menu.open {
    display: flex;
    flex-direction: column;
    align-items: center;
    position: fixed;
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
    background-color: var(--fontColor);
    font-size: 36px;
    z-index: 9999;
    opacity: 0.9; 
  }
 
  
  .navs #mobile-menu p {
    margin-top: 40px;
    cursor: pointer;
    text-align: center;
    color: black;
  }
  
  .navs #mobile-menu a {
    text-decoration: none;
    color: black;
  }
}
  </style>
 </head>
 <body>
 
  
  <div id="nav-container">
    
    <nav class="navs">


      
      <div id="mobile-menu">
        
        <p><a href="#">Jobs</a></p>
        <p><a href="#">Candidates</a></p>
        <p><a href="#">Profile</a></p>
        <p id="close"><a href="#">X</a></p>
        
      </div>

    </nav>
    
  </div>
  
  <main>
    
    <section>
      <h2><?php echo $sesIdno; ?></h2>
      <p><h4>Welcome to your sales view.</h4></p>
    </section>
    
    <section>
      <div class="jobStatisticsDiv">
        <i class="fa fa-briefcase fa-2x" aria-hidden="true"></i>
        <h2 clas="h2s">PHP 2,393<br><span><h5>Total Income</h5></span></h2>
      </div> 
      <div class="jobStatisticsDiv">
        <i class="fa fa-user fa-2x" aria-hidden="true"></i>
        <h2>193<br><span><h5>Total successful court booking</h5></span></h2>
      </div>
      <div class="jobStatisticsDiv">
        <i class="fa fa-trophy fa-2x" aria-hidden="true"></i>
        <h2>74<br><span>Successful</span></h2>
      </div>
    </section>
    
    <section>
      <div id="barChart"></div>
    </section>
    
  </main>



<script type="text/javascript">
  var barChartData = {
  type: 'bar',
  globals: {
    fontFamily: 'Montserrat',
    fontColor: 'var(--darkFontColor)',
    fontWeight: 'normal'
  },
  title: {
    text: 'History',
    align: 'left',
    marginTop: '8px',
    marginLeft: '32px',
    fontWeight: 'normal',
    shadow: false,
    rules: {
      
    }
  },
  legend: {
    marginTop: '16px',
    borderWidth: 0,
    layout: '1',
    marker: {
      type: 'circle'
    }
  },
  plotarea: {
    margin: '80px 80px 80px 80px'
  },
  plot: {
    barWidth: '8px',
    borderRadius: 4
  },
  scaleX: {
    lineWidth: 0,
    tick: {
      visible: false
    },
    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Nov', 'Dec']
  },
  scaleY: {
    lineWidth: 0,
    tick: {
      visible: false
    },
    guide: {
      lineStyle: 'solid',
      lineColor: 'var(--gray)'
    }
  },
  series: [
    {
      values: [60, 55, 50, 50, 60, 50, 20, 15, 70, 50, 65],
      backgroundColor: 'var(--blue)',
      text: 'Jobs'
    },
    {
      values: [50, 45, 50, 45, 50, 30, 15, 5, 55, 50, 45],
      backgroundColor: 'var(--blue)',
      text: 'Candidates'
    },
    {
      values: [30, 30, 25, 30, 30, 35, 5, 0, 45, 30, 30],
      backgroundColor: 'var(--green)',
      text: 'Successful'
    }
  ]
};

zingchart.render({
  id: 'barChart',
  data: barChartData,
  height: '100%',
  width: '100%'
});

var hamburgerMenu = document.querySelector('.fa-bars');
var mobileMenu = document.querySelector('#mobile-menu');
var close = document.querySelector('#close');

hamburgerMenu.addEventListener('click', function() {
  if (hamburgerMenu) {
    mobileMenu.classList.add('open');
  }
});

close.addEventListener('click', function() {
  if (close) {
    mobileMenu.classList.remove('open');
  }
});
</script>

 </body>
 </html>