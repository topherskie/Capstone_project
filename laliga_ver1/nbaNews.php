


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