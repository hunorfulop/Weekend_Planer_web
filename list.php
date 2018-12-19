<html>
<head>
<style>
	table, td, th {
	  border: 1px solid black;
	}

	table {
	  border-collapse: collapse;
	  width: 100%;
	}

	th {
	  height: 50px;
	}
	h3 {
		text-align: center;
	}
</style>

</head>
<body>
	<?php
		include("menu.php");
		if(!isset($_SESSION["user"])) {
			header("Location:login.php");  
			exit;   
		}	
	?>
	<h3 style="color:red;">List of awesome Events</h3>
	<table id="myTable">
	  <tr>
		<th>Address</th>
		<th>Name</th>
		<th>Description</th>
		<th>Start_Date</th>
		<th>End_Date</th>
		<th>Change</th>
	  </tr>
	</table>
	
	
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
	var ref = firebase.database().ref("Event");
	
	ref.once('value').then(function(snapshot) {
		snapshot.forEach(function(Snapshots) {
			
			var valami = Snapshots.val();
			
			var table = document.getElementById("myTable");
			var row = table.insertRow(-1);
			var cell1 = row.insertCell(-1);
			var cell2 = row.insertCell(-1);
			var cell3 = row.insertCell(-1);
			var cell4 = row.insertCell(-1);
			var cell5 = row.insertCell(-1);
			var cell6 = row.insertCell(-1);
			
			cell1.innerHTML = valami.address;			
			cell2.innerHTML = valami.name;
			cell3.innerHTML = valami.description;
			cell4.innerHTML = valami.start_date;
			cell5.innerHTML = valami.end_date;
			if(valami.author == <?php echo $_SESSION["user"]; ?>){
				aux=Snapshots.key;
				cell6.innerHTML='<button id='+aux+' onclick="foo(this.id)">Update</button>';
			}
		});
	});
	
	function foo(clicked_id){		
		window.location.href = "http://localhost/feladat/edit.php?id="+clicked_id+"";
	}
	
</script>

</body>
</html>