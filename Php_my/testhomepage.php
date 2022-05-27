<!DOCTYPE html>
<html>
    <head>
        <title>Homepage Covid Management</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="homepage.css">
		<?php
		    $host = "localhost";
			$user ="postgres";
			$pass = "root";
			$db = "New_pj";
			$con = pg_connect("host=$host port=5432 dbname=$db user=$user password=$pass") or die ("could not connect to Server\n");
			if(!$con){
				echo "Error\n";
			}else{
			$query = "SELECT COUNT (*) FROM infected WHERE date_infected = CURRENT_DATE;";
			$result = pg_query($con,$query);
			
			$query1 = "SELECT COUNT (*) FROM infected WHERE date_infected = CURRENT_DATE-1;";
			$result1 = pg_query($con,$query1);

			$query2 = "SELECT COUNT (*) FROM infected WHERE date_infected = CURRENT_DATE-2;";
			$result2 = pg_query($con,$query2);

			$query3 = "SELECT COUNT (*) FROM infected WHERE date_infected = CURRENT_DATE-3;";
			$result3 = pg_query($con,$query3);

			$query4 = "SELECT COUNT (*) FROM infected WHERE date_infected = CURRENT_DATE-4;";
			$result4 = pg_query($con,$query4);

			$query5 = "SELECT COUNT (*) FROM infected WHERE date_infected = CURRENT_DATE-5;";
			$result5 = pg_query($con,$query5);

			$query6 = "SELECT COUNT (*) FROM infected WHERE date_infected = CURRENT_DATE-6;";
			$result6 = pg_query($con,$query6);

			$query7 = "SELECT COUNT (*) FROM infected WHERE cure_date = CURRENT_DATE;";
			$result7 = pg_query($con,$query7);
			
			$query8 = "SELECT COUNT (*) FROM death WHERE death_time = CURRENT_DATE;";
			$result8 = pg_query($con,$query8);
			
			$query9 = "SELECT  count(*)  FROM infected I1 WHERE I1.times = 1;";
			$result9 = pg_query($con,$query9);

			$query10 = "SELECT  people_recovered_from_covid() "."count".";";
			$result10 = pg_query($con,$query10);

			$query11 = "SELECT COUNT (*) FROM death WHERE death_time is not null;";
			$result11 = pg_query($con,$query11);

			$query12 = "SELECT * FROM statistics_vaccine('{verocell,astrazeneca,moderna}');";
			$result12 = pg_query($con,$query12);
			
			$query13 = "SELECT * FROM statistics_vaccine_NOT('{verocell,astrazeneca,moderna}');";
			$result13 = pg_query($con,$query13);

				$kq = pg_fetch_object($result);
				$kq1 = pg_fetch_object($result1);
				$kq2 = pg_fetch_object($result2);
				$kq3 = pg_fetch_object($result3);
				$kq4 = pg_fetch_object($result4);
				$kq5 = pg_fetch_object($result5);
				$kq6 = pg_fetch_object($result6);
				$kq7 = pg_fetch_object($result7);
				$kq8 = pg_fetch_object($result8);
				$kq9 = pg_fetch_object($result9);
				$kq10 = pg_fetch_object($result10);
				$kq11 = pg_fetch_object($result11);
				$kq12 = pg_fetch_object($result12);
				$kq13 = pg_fetch_object($result12);
				$kq14 = pg_fetch_object($result12);
				$kq15 = pg_fetch_object($result13);
		}
		 	pg_close($con);   	
		?> 

		
   

        




  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
     <script type="text/javascript">
      google.charts.load("current", {packages:["bar"]});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales', 'Expenses', 'Profit'],
          ['2014', 1000, 400, 200],
          ['2015', 1170, 460, 250],
          ['2016', 660, 1120, 300],
          ['2017', 1030, 540, 350]
        ]);

        var options = {
          chart: {
            title: 'Company Performance',
            subtitle: 'Sales, Expenses, and Profit: 2014-2017',
          },
          bars: 'vertical',
          vAxis: {format: 'decimal'},
          height: 400,
          colors: ['#1b9e77', '#d95f02', '#7570b3']
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>



    <script type="text/javascript">
    	var kq7= <?php echo json_encode($kq12->type_of_vaccine)?> ;
    	var kq8 = Number(<?php echo json_encode($kq12->count)?>);
    	var kq9 = <?php echo json_encode($kq13->type_of_vaccine)?> ;
    	var kq10 = Number(<?php echo json_encode($kq13->count)?>);
    	var kq11 = <?php echo json_encode($kq14->type_of_vaccine)?> ;
    	var kq12 = Number(<?php echo json_encode($kq14->count)?>);
    	var kq13 = Number(<?php echo json_encode($kq15->count)?>);
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          [kq7,     kq8],
          [kq9,      kq10],
          [kq11,kq12],
          ['Other', kq13]
          
        ]);

        var options = {
          title: 'Số người được tiêm theo mũi',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
    </head>
    
    <body>
        <!-- Navbar -->
        <div class="nav">
            <ul class="nav-list">
                <li class="nav-item">Trang chủ</li>
                <li class="nav-item">Thống kê</li>
            </ul>
            <ul class="nav-list">
                <li class="nav-item">Đăng nhập</li>
            </ul>
        </div>
        <div>
        	<h1>Trang thông tin quản lí Covid Quận Hai Bà Trưng</h1>
        </div>
        <div id="columnchart_material" style="width: 800px; height: 500px;"></div>
        <div class = "page">
        <div >
        	<ul>Hôm nay</ul>
        		<li>Số người mắc covid  :
	        		<script type="text/javascript">  
	        			var k1= Number(<?php echo json_encode($kq->count)?>);
	        			document.write(k1);
	        		</script>
				</li>
				<li>Số người khỏi bệnh :
					<script type="text/javascript">  
	        			var k2= Number(<?php echo json_encode($kq7->count)?>);
	        			document.write(k2);
	        		</script>
				</li>
				<li>Số ca tử vong :
					<script type="text/javascript">  
	        			var k3= Number(<?php echo json_encode($kq8->count)?>);
	        			document.write(k3);
	        		</script>
				</li>
			<ul>Trên toàn khu vực</ul>
        		<li>Số người mắc covid  :
        			<script type="text/javascript">  
	        			var k4= Number(<?php echo json_encode($kq9->count)?>);
	        			document.write(k4);
        			</script>
				</li>
				<li>Số người khỏi bệnh :
					<script type="text/javascript">  
	        			var k5= Number(<?php echo json_encode($kq10->count)?>);
	        			document.write(k5);
        			</script>
				</li>
				<li>Số tử vong :
					<script type="text/javascript">  
	        			var k6= Number(<?php echo json_encode($kq11->count)?>);
	        			document.write(k6);
        			</script>
				</li>
        </div>
        
    <br/>
    <div id="piechart_3d" style="width: 30%; height: 300px;"></div>
    
     </div>
     
    </body>
</html>