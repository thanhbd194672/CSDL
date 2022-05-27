<?php
$host = "localhost";
$user ="postgres";
$pass = "root";	
$db = "New_pj";
$con = pg_connect("host=$host port=5432 dbname=$db user=$user password=$pass") or die ("could not connect to Server\n");
if(!$con){
	echo "Error\n";
}else{
	if(!empty($_POST)){
		$id_key = $_POST["Id_person"];
    	$death_time = $_POST['death_time'];
    	$query = " UPDATE users
    		SET death_time ='".$death_time."'
    		WHERE id_person = $id_key; ";
	echo "<script type='text/javascript'>alert('Thêm test thành công!');</script>";
	pg_query($con,$query);
	}
}
	pg_close($con);
?> 