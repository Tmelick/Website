<html>
<head>
	<link rel='stylesheet' href='stylesheet.css'>
	<title> Home Page </title>
</head>
<body>
	<table cellpadding='3' cellspacing'3' class='tab_main'>
	<!--This will be the Logo-->
	<tr>
		<td colspan='5'><img src='Logo.jpg' height='65%' width='100%'>
	</tr>
 <button class="accordion">News</button>
<div class="panel">
  <p>It Worked...</p>
</div>

<button class="accordion">Profile</button>
<div class="panel">
  <li><a href="google.com">Google</a></li>
</div>

<button class="accordion">Information</button>
<div class="panel">
  <p>It Worked...</p>
</div> 
<script>

var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}
</script>
</body>
</html>