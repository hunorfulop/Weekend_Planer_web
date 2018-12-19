<!DOCTYPE html>
<html>

	<?php
	include("menu.php");
	if(!isset($_SESSION["user"])) {
        header("Location:login2.php");  
        exit;   
    }
	
	?>
<style>
	#input_welcome {
		border: 0;
		font-size: 30px;
	}
</style>
<body>
	<input type="text" id="input_welcome"> 
	
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
		
		ref.once('value').then(function(snapshot) {
			snapshot.forEach(function(Snapshots) {
				var valami = Snapshots.val();
				if(Snapshots.key == <?php echo $_SESSION["user"]; ?>)
					document.getElementById("input_welcome").value = "Welcome " + valami.firstname + " " + valami.lastname;
			})
		});
	
	</script>
</body>
</html>