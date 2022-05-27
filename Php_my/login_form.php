<!DOCTYPE html>
<html>
<head>
	<title>Đăng nhập</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<center><h1>Welcome to covid management site</h1> </center>
	<div class = "container-fluid">
		<table class = "table table-bordered table-hover">
			<tr>
				<th>Họ và Tên </th>
				<th>CMND</th>
				<th>BHYT</th>
				<th>Ngày Sinh</th>
				<th>Quốc tịch</th>
				<th>SĐT</th>
				<th>Trạng thái</th>
			</tr>	
			<tbody>
<?php
$host = "localhost";
$user ="postgres";
$pass = "root";
$db = "New_pj";
$con = pg_connect("host=$host port=5432 dbname=$db user=$user password=$pass") or die ("could not connect to Server\n");
if(!$con){
	echo "Error\n";
}else{
	// $name = $_POST['username'];
	// $password = $_POST['password']

	$query = "SELECT * FROM users ORDER BY(id_person)";
	$result = pg_query($con,$query);

	while($row = pg_fetch_object($result)){
		echo 
			'<tr>
					<td>'.$row->name_person.'</td>
					<td>'.$row->national_id_number.'</td>
					<td>'.$row->health_insurance.'</td>
					<td>'.$row->date_of_birth.'</td>
					<td>'.$row->nationality.'</td>
					<td>'.$row->telephone_number.'</td>
					<td>'.$row->state_person.'</td>
			</tr>'	;
	}
}
 	pg_close($con);
?>
	
			</tbody>
		</table>
	</div>
</body>
</html>