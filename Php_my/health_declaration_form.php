<?php
session_start();
require_once("health_declaration.php");
// insert();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Basic tutorial</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<form method="POST" action="">
		<div class = "form-group">
			<label for = "id_person">id_person:</label>
			<input type="integer" class="form-control" id="id_person" placeholder="Enter id_person" name="id_person">
		</div>
		<div class = "form-group">
			<label for = "symptoms">symptoms:</label>
			<input type="text" class="form-control" id="symptoms" placeholder="Enter symptoms" name="symptoms">
		</div>
		<div class = "form-group">
			<label for = "current_address">current_address:</label>
			<input type="text" class="form-control" id="current_address" placeholder="Enter current_address" name="current_address">
		</div>
		<div class = "form-group">
			<label for = "come_from_danger_area">come_from_danger_area:</label>
			<input type="boolean" class="form-control" id="come_from_danger_area" placeholder="Enter come_from_danger_area" name="come_from_danger_area">
		</div>
		<div class = "form-group">
			<label for = "time_declaration">time_declaration:</label>
			<input type="date" class="form-control" id="time_declaration" placeholder="Enter time_declaration" name="time_declaration">
		</div>
		<div class = "form-group">
			<label for = "possible_covid">possible_covid:</label>
			<input type="integer" class="form-control" id="possible_covid" placeholder="Enter possible_covid" name="possible_covid">
		</div>
		
		<button class="btn btn-success">Insert</button>
	</form>
</body>
</html>