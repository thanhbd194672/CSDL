<?php
session_start();
?>
<?php
$host = "localhost";
$user ="postgres";
$pass = "root";	
$db = "New_pj";
$con = pg_connect("host=$host port=5432 dbname=$db user=$user password=$pass") or die ("could not connect to Server\n");
if(!$con){
	echo "Error\n";
}else{
	if(isset($_POST["Username"]) != ''&&isset($_POST["Password"]) != ''){
		$u = $_POST['Username'];
		$p = $_POST['Password'];
	if($u =='admin'&&$p=='admin'){
		header("location:manage.php");
	}
	else{
		$query = "SELECT  id_person,national_id_number, health_insurance FROM users 
		WHERE national_id_number ='$u' AND health_insurance = '$p';";
		
		$result = pg_query($con,$query);	
		$kq = pg_fetch_object($result);
	if($kq>0){
		$_SESSION["id_key"] = $kq->id_person;
		header("location:users.php");
	}
	else{
		echo "<script type='text/javascript'>alert('Dang nhap that bai');</script>";
		require_once 'login.html';
		}
	}
	}
	
}
	pg_close($con);
?> 
