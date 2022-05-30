const rootNews = document.getElementById("root-news");


 // api link for basketball news
fetch("http://site.api.espn.com/apis/site/v2/sports/basketball/nba/news")
.then(response => response.json())
.then(result => {
  console.log(result);

    for (let i = 0; i < 24; i++) {
      displayData(result, i);
    }

})



function displayData(data, el) {
  const item = `
  <div class="news-container">
    <div class="row">
    <div class="column">
      <div class="card-d">
        <img src="${data.articles[el].images[el].url}" alt="${data.articles[el].images[el].type}" class="img-style">
        <h3>${data.articles[el].headline}</h3>
        <p>${data.articles[el].description}</p>
        <hr>
        <p><h3>Last Updated</h3>${data.articles[el].lastModified}</p>
        <p></p>
        <p>Some text</p>
      </div>
    </div>
  </div>
  </div>
  `;

  rootNews.textContent += item;
}
