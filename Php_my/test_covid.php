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
		$Id_person = $_POST['Id_person'];
		$Method_test = $_POST['Method_test'];
		$Test_result = $_POST['Test_result'];
		$Time_test = $_POST['Time_test'];
		$Test_location = $_POST['Test_location'];
		$query = "INSERT INTO test_covid(
		id_person, method_test, test_result, time_test, test_location)
		VALUES ('".$Id_person."','".$Method_test."','".$Test_result."','".$Time_test."','".$Test_location."')";
	echo "<script type='text/javascript'>alert('Thêm test thành công!');</script>";
	pg_query($con,$query);
	}
}
	pg_close($con);
?> 

