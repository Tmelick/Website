<html>
	<head>
		<link rel='stylesheet' href='stylesheet.css'>
			<title> Sign-up Page</title>
			<script type='text/javascript'>
	function signUp(){
		var name = document.form.name.value;
		var email = document.form.email.value;
		var age = document.form.age.value;
		var gender = document.form.email.value;
		var user = document.form.user.value;
		var password = document.form.password.value;
		var picture = document.form.picture.value;

	if(name.length==0||email.length==0||age.length==0||user.length==0||password.length==0){
			if(name.length==0){
			s1.innerHTML="<font color='red'>Enter Name</font>";
			}
			if(email.length==0){
			s3.innerHTML="<font color='red'>Enter Email</font>";
			}
			if(age.length==0){
			s5.innerHTML="<font color='red'>Enter Age</font>";
			}
			if(user.length==0){
			s10.innerHTML="<font color='red'>Enter User name</font>";
			}
			if(password.length==0){
			s8.innerHTML="<font color='red'>Enter Password</font>";
			}
			if(picture.length==0){
			s11.innerHTML="<font color='red'>Pick a Picture</font>";
			}
		}
	if(age < 18){
	s5.innerHTML="<font color='red'> Age must be Over 18</font>";
	}
	else {
		document.form.submit();

	}
	}
					</script>
				</head>
				<body style="background-color:#000000">
					<table cellpadding='0' cellspacing'0' class="main">
						<!--This will be the Logo-->
						<tr>
							<td id="logoRow">
								<img src='Logo.jpg' style="width:500px;height:600px;">
								</td>
								<form method='POST' name='form' action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>'>
									<td>
										<table>
											<tr>
												<td style="color:white">
													<b>Name</b>
												</td>
												<td>
													<input type='text' name='name' maxlength='50'>
													</td>
													<td>
														<span id='s1'> </span>
													</td> 
												</tr>
												<tr>
													<td style="color:white">
														<b>Email</b>
													</td>
													<td>
														<input type='email' name='email' maxlength='50'>
														</td>
														<td>
															<span id='s3'> </span>
														</td> 
													</tr>
													<tr>
														<td style="color:white">
															<b>Age</b>
														</td>
														<td>
															<input type='number' name='age' >
															</td>
															<td>
																<span id='s5'> </span>
															</td>
															<td>
																<span id='s2'> </span>
															</td>
														</tr>
														<tr>
															<td style="color:white">
																<b>Gender</b>
															</td>
															<td>
																<select name='gender'> 
																	<option value='M'>Male
																		<option value='F'>Female
																			<option value='O'>Other
																			</select>
																		</td>
																	</td>
																</tr>
																<tr>
																	<td style="color:white">
																		<b> User Name </b>
																	</td>
																	<td>
																		<input type='text' name='user' maxlength='50'>
																		</td>
																		<td>
																			<span id='s10'/>
																		</td>
																	</tr>
																	<tr>
																		<td style="color:white">
																			<b> Password</b>
																		</td>
																		<td>
																			<input type='password' name='password' maxlength='50'>
																			</td>
																			<td>
																				<span id='s8'> </span>
																			</td>
																		</tr>
																		<tr>
																			<td style="color:white">
																				<b> Profile Picture </b>
																			</td>
																			<td>
																				<input type='file' name='picture'>
																				</td>
																				<td>
																				<span id ='s11'></span>
																				</td>
																			</tr>
																			<tr>
																				<td>
																					<br>
																						<input  class ='signUpButton' type='button' value='Sign-up' name='s1' onclick='signUp()'>
																						</td>
																					</tr>
																				</table>
																			</td>
																		</form>
																	</tr>
																</table>
																<?php
	
	$name=$email=$age=$gender=$user=$password=$count=$count_id="";
	if($_SERVER["REQUEST_METHOD"]=="POST") {
		function format($data) {
		$data=trim($data);
		$data=stripslashes($data);
		$data=htmlspecialchars($data);
		return $data;
	}
			$name=format($_POST["name"]);
			$email=format($_POST["email"]);
			$age=format($_POST["age"]);
			$gender=format($_POST["gender"]);
			$user=format($_POST["user"]);
			$password=format($_POST["password"]);
			$picture=format($_POST["picture"]);
	
			$config = parse_ini_file('/home/tmelick/public_html/Website/private/config.ini');
			$resid=MySQLi_Connect($config['severname'],$config['username'],$config['password'],$config['dbname']);	
			if(MySQLi_Connect_Errno()) {
				echo "<tr align='center'>
 <td colspan='5'> Failed to connect to MySQL </td>
 </tr>";
			}
			else {
			$check_user=MySQLi_Query($resid,"select name from users where user='".$user."'");
			$r_user=MySQLi_Fetch_Row($check_user);
			
			if($r_user) {
				echo "<tr align='center'>
 <td colspan='5'>
 <font color='red'> User Name already Registered, Registration Failed!  </font>
  </td>
 </tr>";
			}
			
			else {
			$count=MySQLi_Query($resid,"select (max(id)+1) as count  from users");
			$count_id=MySQLi_Fetch_Assoc($count);
			if($count_id["count"]) {
				$query="insert into users values (".$count_id["count"].",'$name','$email',$age,'$gender','$user','$password','$picture')";
			}
			else {
				$query="insert into users values (1,'$name','$email',$age,'$gender','$user','$password','$picture')";
			}
			$res=MySQLi_Query($resid,$query);
			if($res) {
			echo "<script type='text/javascript'> document.location = 'login.html'; </script>";
			}
			
			
			else {
				echo "<tr align='center'>
 <td colspan='5'>
 <font color='red'> Registration Failed! </font>
 </td>
 </tr>";
			}
			}
			MySQLi_Close($resid);
			}
			
			
	
	}
	?> 
															</body>
														</html>