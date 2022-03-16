<!DOCTYPE html>
<html>
<head>
    <title> bwaaah </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="change_couleur.css">
<style>
.loader {
  /*border: 16px solid #f3f3f3;*/
  /*border-top: 16px solid #3498db;*/
  border-radius: 50%;
  width: 150px;
  height: 150px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;

  margin-top: 100px;
}

/* Safari */
@-webkit-keyframes spin {
  100% { -webkit-transform: rotate(360deg); }
  0% { -webkit-transform: rotate(0deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
</head>
<body>

<div class="text"> chargement... </div>


<img class="loader" src="foto.jpg">

<p id="demo"></p>
<script> 

let text;
let mdp = prompt("mdp?");
switch(mdp) {
  case "97480":
    text = "";
    break;
  default:
  window.location = "https://google.com";
}
  document.getElementById("demo").innerHTML = text;

  

</script>
<div class="background">
</body>
</html>