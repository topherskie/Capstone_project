	<?php require 'inc/header.php'; ?>

<style type="text/css">
	
.news-main-container {
	display:  flex;
	/*border: 2px solid black;*/
	align-content: center;
	justify-content: center;
	padding:  15px;
	margin:  2em;

}

.nba-container {
	display: flex;
	padding: 1em;
}

.pba-container {
	display: flex;
	padding: 1em;
	font-weight: bold;
}

.btn-nba-pba-css {
	padding: 12px;
	cursor: pointer;
	font-weight: bold;
	color: #F7F7F7;
	background: #203239;
	width: 8rem;
	border-radius: 0.5em;
}




/*card container*/
.root-container {
	/*border: 2px solid black;*/
	padding: 12px;
	width: 100%;
	align-content: center;
}

.news-container {
	padding:  12px;
	margin:  9px;
	flex: 0 0 200px;
    margin: 10px;
    border: 1px solid #ccc;
    box-shadow: 3px 3px 7px 0px  rgba(0,0,0,0.4);
    justify-content: center;
    border-radius: 0.5em;
}

.news-card-container {
	display: flex;
    flex-wrap: wrap;
    align-items: stretch;
	/*border: 3px solid blue;*/
	justify-content: center;
	align-content: center;
}

img {
	 max-width: 100%;
}
</style>



	<div id="dataNewsContainer" class="news-card-container">
		
	</div>


	
	
	

<script defer>
	

	async function getNewsData() {
		const dataNewsContainer = document.getElementById("dataNewsContainer");
		const apiEndPoint = "http://site.api.espn.com/apis/site/v2/sports/basketball/nba/news";
		const response = await fetch(apiEndPoint);
		const result = await response.json();
		
		// function 
		renderNbaNews(result);
	} 
	
	getNewsData();



	// render data to browser
	function renderNbaNews(data) {
		console.log(data);
	
	
	for (let i = 0; i < data.articles.length; i++) {
		const anchor = document.createElement("A");
		var link = document.createTextNode(`Full Story: ${data.articles[i].links.web.href}`);
		anchor.appendChild(link);
		anchor.title = "This is Link"; 
		anchor.setAttribute('target', '_blank');
		const newsImage = document.createElement('IMG');
		const newsDiv = document.createElement("DIV");
		newsDiv.classList.add("news-container");
		const p = document.createElement("P");
		const h3Headline = document.createElement("H3");
		const h3Node = document.createTextNode(data.articles[i].headline);
		const pNode = document.createTextNode(data.articles[i].description);
		anchor.href = data.articles[i].links.web.href;
		newsImage.src = data.articles[i].images[0].url;
		h3Headline.appendChild(h3Node);
		p.appendChild(pNode);
		newsDiv.appendChild(newsImage);
		newsDiv.appendChild(h3Headline);
		newsDiv.appendChild(p);
		newsDiv.appendChild(anchor);
		dataNewsContainer.appendChild(newsDiv);
		

		
	}


	} // end of main input

 


</script>