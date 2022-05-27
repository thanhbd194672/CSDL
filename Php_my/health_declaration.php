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
		$id_person = $_POST['id_person'];
		$symptoms = $_POST['symptoms'];
		$current_address = $_POST['current_address'];
		$come_from_danger_area = $_POST['come_from_danger_area'];
		$time_declaration = $_POST['time_declaration'];
		$possible_covid = $_POST['possible_covid'];
		$query = "INSERT INTO public.health_declaration(
	id_person, symptoms, current_address, come_from_danger_area, time_declaration, possible_covid)
	VALUES ('".$id_person."','".$symptoms."','".$current_address."','".$come_from_danger_area."','".$time_declaration."','".$possible_covid."')";
	echo "Add success";
	pg_query($con,$query);
	}
}
	pg_close($con);
?> 