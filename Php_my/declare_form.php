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
	<form method="POST" action="insert_users.php">
		<div class = "form-group">
			<label for = "id_family">id_family:</label>
			<input type="integer" class="form-control" id="id_family" placeholder="Enter id_family" name="id_family">
		</div>
		<div class = "form-group">
			<label for = "name_person">name_person:</label>
			<input type="text" class="form-control" id="name_person" placeholder="Enter name_person" name="name_person">
		</div>
		<div class = "form-group">
			<label for = "national_id_number">national_id_number:</label>
			<input type="text" class="form-control" id="national_id_number" placeholder="Enter national_id_number" name="national_id_number">
		</div>
		<div class = "form-group">
			<label for = "health_insurance">health_insurance:</label>
			<input type="text" class="form-control" id="health_insurance" placeholder="Enter health_insurance" name="health_insurance">
		</div>
		<div class = "form-group">
			<label for = "date_of_birth">date_of_birth:</label>
			<input type="date" class="form-control" id="date_of_birth" placeholder="Enter date_of_birth" name="date_of_birth">
		</div>
		<div class = "form-group">
			<label for = "nationality">nationality:</label>
			<input type="text" class="form-control" id="nationality" placeholder="Enter nationality" name="nationality">
		</div>
		<div class = "form-group">
			<label for = "telephone_nuber">telephone_number:</label>
			<input type="text" class="form-control" id="telephone_number" placeholder="Enter telephone_number" name="telephone_number">
		</div>
		<button class="btn btn-success">Insert</button>
	</form>
</body>
</html>