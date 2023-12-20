console.log("JS loading");

var divshowbtn = document.getElementById('popushow');
var pupupdiv = document.getElementById('popupdiv');
divshowbtn.addEventListener('click', function annon() {
	alert("clicked");
	pupupdiv.classList.add("show");
})