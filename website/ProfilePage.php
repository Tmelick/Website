<!doctype html>
<html>
	<head>
		<link rel='stylesheet' href='stylesheet.css'>
			<title> Profile Page </title>

			<script src='jquery.js'/>
			<script type='text/javascript'>
	$(document).ready(function() 
	{
		$("#sam").hide(2000);
	});
			</script>

		</head>
		<body style="background-color:#000000">
			<table>
				<tr>

					<?php
	 
	
	$email=$user=$password="";
	
	//This checks to make sure that the user is the correct user 
	//and they got to the site correctly. It redirects to 
	//the sign up page to show they should sign up correctly
	if(!isset($_SESSION['user_id']) && !isset($_POST['hidden'])){
		echo "<script type='text/javascript'> document.location = 'login.html';</script>";
		echo "<script>window.alert('Error')";
	}
	
	if(isset($_SESSION['user_id'])){
				$_POST['hidden'] = "check";
				$_POST['email'] = $_SESSION['email'];
				$_POST['password'] = $_SESSION['password'];
				$_POST['user']= $_SESSION['user'];
	}
	function format($data){
	$data=trim($data);
	$data=stripslashes($data);
	$data=htmlspecialchars($data);
	return $data;
	}
	
	if($_POST['hidden']=="check"){
		$email=format($_POST["email"]);
		$password=format($_POST["password"]);
		$user=format($_POST["user"]);
	}
	$query="select * from users where user='$user' and password='$password'";
	$config = parse_ini_file('/home/tmelick/public_html/Website/private/config.ini');
	$resid=MySQLi_Connect($config['severname'],$config['username'],$config['password'],$config['dbname']);	
	if(MySQLi_Connect_Errno()){
		echo"<tr>
<td>failed to connect to mysql</td>
</tr>";
	}
	else{
		$result=MySQLi_Query($resid,$query);
		$array=MySQLi_Fetch_Assoc($result);
		if($array){
		$_SESSION["user_id"] = $array["id"];
		$user_here = $_SESSION["user_id"];
		$_SESSION["name"] = $array["name"];
		$_SESSION["password"] = $array["password"];
		$_SESSION["age"] = $array["AGE"];
		$_SESSION["email"] = $array["email"];
		$_SESSION["gender"] = $array["gender"];
		$_SESSION["picture"] = $array["picture"];
		

echo '<td>
<div class="Menu">
<button class="accordion">News</button>
<div class="panel">
<font color="white">Working on this</font>
</div>

<button class="accordion">Search</button>
<div class="panel">
<font color="white">Search For Friends</font>
 <p>
<form method="POST" name="form" action="search.php">
<input type="text" name="searching" maxlength="25">
</p>
</form>
</div>


<button class="accordion">Friends</button>
<div class="panel">
  <font color="white">Friends</font>
</div>
				</div>
					</td>';
					?>
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
							<?php
					echo '<td>
					<div class="statusUpdates">
					<font color="white">Status Updates</font>
					</div>
					</td>	
						<td>
						<div class="imgDiv">
						 <img src='. $array["picture"] .' alt="Mountain" style="width:400px;height:500px;"> 
						 <input type="button" value="Sign-Out" class="Sign-Out-Button" onclick=location.href="Sign-Out.php";>
						</div>
						</td>
					</tr>';					
		}
		else{
		echo "<script type='text/javascript'> document.location = 'login.html';</script>";
		}
		MySQLi_Close($resid);
	}
	?>
						</tr>	
					</table>
				</body>
			</html>