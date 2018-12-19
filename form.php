<!DOCTYPE html>
<html>

	<?php
		include("menu.php");
		if(!isset($_SESSION["user"])) {
			header("Location:login.php");  
			exit;   
		}	
	?>

<style>
	input[type=text] {
		width: 100%;
		padding: 12px 20px;
		margin: 8px;
		border-radius: 4px;
		
		display: inline-block;
		border: 1px solid #ccc;    
		box-sizing: border-box;
		color: gray;
	}
	input[type=submit] {
		width: 100%;    
		padding: 12px 20px;
		margin: 8px;
		border-radius: 4px;
		
		border: none;    
		background-color: green;
		color: white;
	}
	div {
		border-radius: 5px;
		background-color: #f2f2f2;
	}
	h3 {
		text-align: center;
		color: red;
	}
</style>
<body>

<h3>Append an event</h3>

<div>
  <form id="form1">
    <label for="fname">Name</label>
    <input type="text" id="name"  placeholder="Your name..">

    <label for="lname">Address</label>
    <input type="text" id="address"  placeholder="Address..">

	<!--
	<label for="fname">Image</label>
    <input type="text" id="imgage" placeholder="Image..">
	-->
	
	<label for="fname">Start Date</label>
    <input type="text" id="start_date"  placeholder="DD-MON-YY">
	
	<label for="fname">End Date</label>
    <input type="text" id="end_date"  placeholder="DD-MON-YY">
	
	<label for="fname">Description</label>
    <input type="text" id="description"  placeholder="Write some thought..">
	
	
    <input type="hidden" id="author" value=<?php echo $_SESSION["user"]; ?> >
	
	<button type="submit">Submit</button>
  </form>
</div>

<script src="https://www.gstatic.com/firebasejs/5.5.9/firebase.js"></script>
<script src="main.js"></script>

</body>
</html>
