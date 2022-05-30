<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<title>Pba news</title>
</head>
<body>


<h2>PBA NEWS!</h2>

<h3 id="hs"></h3>

<script>
  /* fetch('https://jsonplaceholder.typicode.com/posts/2')
  .then((response) => response.json())
  .then((json) => {
  	console.log(json)
  	document.querySelector("#hs").textContent = json.title;
  }); */

  // var url = 'https://newsapi.org/v2/everything?' +
  //         'q=pbaph&' +
  //         'from=2022-03-08&' +
  //         'sortBy=popularity&' +
  //         'apiKey=7fa63388e8a142039ead148465c56ce5';

  // var url = "https://newsapi.org/v2/everything?q=pba&apiKey=7fa63388e8a142039ead148465c56ce5";

  // var url = "https://newsapi.org/v2/everything?q=pba&apiKey=7fa63388e8a142039ead148465c56ce5";  
  // var url = 'https://newsapi.org/v2/top-headlines?' +
  //         'q=ginebra&' +
  //         'country=ph&' +
  //         'apiKey=7fa63388e8a142039ead148465c56ce5';

// 73c6f2159456b8da564ecc26281d5615
  
 
 var url = 'https://newsapi.org/v2/top-headlines?country=ph&category=sports&apiKey=7fa63388e8a142039ead148465c56ce5';

   fetch(url)
  .then((response) => response.json())
  .then((json) => {
    console.log(json);
  
  }); 

</script>


</body>
</html>