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
    if(!empty($_POST['healing_place'])){
      $times = $_POST['times'];
      $healing_place = $_POST['healing_place'];
      $query = " UPDATE infected
      SET healing_place='".$healing_place."'
      WHERE id_person = $id_key AND times = $times; ";
      pg_query($con,$query);
    }
    if(!empty($_POST['cure_date'])){
      $times = $_POST['times'];
      $cure_date = $_POST['cure_date'];
      $query = " UPDATE infected
      SET cure_date='".$cure_date."'
      WHERE id_person = $id_key AND times = $times; ";
      pg_query($con,$query);
    }
    

    
  echo "<script type='text/javascript'>alert('Khai báo thành công!');</script>";
  

  }
}
  pg_close($con);
?> 