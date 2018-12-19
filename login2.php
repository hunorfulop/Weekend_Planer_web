<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<?php	
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$mytext = $_POST['telefonszam'];
		$_SESSION["user"]=$mytext;// a $_SESSION["user"]-be mentsuk el azt a telefonszamot ami a kliense
	}
	?>
	<h2>Login </h2>
	<form action="login2.php" method="POST">
		<div class="form-group">
			<label for="fname">Please write down your Phone number:</label>
			<input type="text" class="form-control" id="telszam" name="telefonszam" placeholder="Phone number ?">
			
			<button type="submit" class="btn btn-default">Sign in</button>
		</div>
	</form>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>	
	<script src="https://www.gstatic.com/firebasejs/5.7.0/firebase.js"></script>	
	<script type="text/javascript">
		var config = {
			apiKey: "AIzaSyBa08eHFq87j7qNOtpGvJ03h904rUPwppA",
			authDomain: "weekendplaner-494c7.firebaseapp.com",
			databaseURL: "https://weekendplaner-494c7.firebaseio.com",
			projectId: "weekendplaner-494c7",
			storageBucket: "weekendplaner-494c7.appspot.com",
			messagingSenderId: "490894679692"
		};
		firebase.initializeApp(config);
		var ref = firebase.database().ref("User");
			
		ref.on('child_added', function(snapshot){//rekurziv fuggveny
			var szam = snapshot.key; // mindegyre valtozik ez az ertek
			if(szam == <?php echo $_SESSION["user"]; ?>)
			{							
				window.location.href="home.php";
			}					
		});				 
	</script>

</body>
</html>