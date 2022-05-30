<?php include 'inc/header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="css/style_basketball_news.css">
    <title>Basketball News</title>
</head>
<body>

    <div class="news-main-container">

        <div class="nba-container">
            <button id="btnNba" class="btn-nba-pba-css">NBA News</button>
        </div>

        <div class="pba-container">
             <button id="btnPba" class="btn-nba-pba-css"><a href="pbaNewsCURL.php" target="_blank">PBA News</a></button>
        </div>   

    </div>


    <div id="root" class="root-container">
        
    </div>

<script src="basketball_news/appNews.js"></script>


<?php include 'inc/footer.php'; ?>