
const btnNba = document.getElementById("btnNba");
const btnPba = document.getElementById("btnPba");

btnNba.addEventListener("click", function() {

	$(document).ready(function(){
		$("#root").empty();
		$( "#root").load( "nbaNews.php", "#root");	
});

});



btnPba.addEventListener("click", function() {

	$(document).ready(function(){
		$("#root").empty();
		$( "#root").load( "pbaNews.php", "#root");
});

});