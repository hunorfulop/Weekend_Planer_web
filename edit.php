<html>
	<?php
		include("menu.php");
	?>
	
<style>
	input {
		width: 100%;
		padding: 12px 10px;
		margin: 8px;
		border-radius: 4px;
		
		display: inline-block;
		border: 1px solid #ccc;    
		box-sizing: border-box;
		color: gray;
	}
	h3 {
		text-align: center;
	}
</style>
<body onload="onload_func()">
<h3 style="color:red;">Edit existing</h3>
<input type="hidden" id="id" value="<?php echo $_GET['id']; ?>" />

<div>
  <form id="form1">
    <label for="fname">Name</label>
    <input type="text" id="name">
	<br>
    <label for="lname">Address</label>
    <input type="text" id="address" >
	<br>
	<label for="fname">Start Date</label>
    <input type="text" id="start_date" >
	<br>
	<label for="fname">End Date</label>
    <input type="text" id="end_date" >
	<br>
	<label for="fname">Description</label>
    <input type="text" id="description" >
	<br>
	<input type="hidden" id="img" >
    <input type="hidden" id="author" >
	<br>
	<input style="color:green;" type="button" name="Submit" value="Edit" onclick="update_func()">
	<br><br><br>
	<input style="color:red;" type="button" name="delete" value="Delete" onclick="delete_func()">
  </form>
</div>
 
<script src="https://www.gstatic.com/firebasejs/5.7.0/firebase.js"></script>	
<script type="text/javascript">
	
	id_event=document.getElementById('id').value;
	
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
	
	function onload_func(){
		ref.child(id_event).once("value", function(snapshot) {
		  snapshot.forEach(function(child) {
			//console.log(child.key+": "+child.val());
			document.getElementById(child.key).value = child.val();
		  });
		});		
	}
	
	
	function update_func(){
		alert('Success');
		//window.location.href = "http://localhost/feladat/list.php";
		//ref.child('event1').update({ name: "New name", description: "new description" });
		
		ref.child(id_event).update({ 
			address: document.getElementById('address').value,
			description: document.getElementById('description').value,
			end_date: document.getElementById('end_date').value,
			name: document.getElementById('name').value, 
			start_date: document.getElementById('start_date').value
		});
		window.location.href = "http://localhost/feladat/list.php";
	}
	function delete_func(){
		alert('Success');
		ref.child(id_event).remove();
		window.location.href = "http://localhost/feladat/list.php";
	}
</script>
</body>
</html>