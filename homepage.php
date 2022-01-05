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

			$query12 = "SELECT * FROM statistics_vaccine('{Sinofoam,Actrazanaka,Moderna}');";
			$result12 = pg_query($con,$query12);
			
			$query13 = "SELECT * FROM statistics_vaccine_NOT('{Sinofoam,Actrazanaka,Moderna}');";
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
         <script type="text/javascript">
         var today = new Date();
       
         var tday = today.getDate();
         var tmonth = today.getMonth()+1;
         var tyear = today.getFullYear();

		var yesterday = new Date (today);
         yesterday.setDate(today.getDate()-1);
         var yday = yesterday.getDate();
         var ymonth = yesterday.getMonth()+1;
         var yyear = yesterday.getFullYear();

         var yyesterday = new Date (today);
         yyesterday.setDate(today.getDate()-2);
         var yyday = yyesterday.getDate();
         var yymonth = yyesterday.getMonth()+1;
         var yyyear = yyesterday.getFullYear();

         var yyyesterday = new Date (today);
         yyyesterday.setDate(today.getDate()-3);
         var yyyday = yyyesterday.getDate();
         var yyymonth = yyyesterday.getMonth()+1;
         var yyyyear = yyyesterday.getFullYear();

         var yyyyesterday = new Date (today);
         yyyyesterday.setDate(today.getDate()-4);
         var yyyyday = yyyyesterday.getDate();
         var yyyymonth = yyyyesterday.getMonth()+1;
         var yyyyyear = yyyyesterday.getFullYear();

         var yyyyyesterday = new Date (today);
         yyyyyesterday.setDate(today.getDate()-5);
         var yyyyyday = yyyyyesterday.getDate();
         var yyyyymonth = yyyyyesterday.getMonth()+1;
         var yyyyyyear = yyyyyesterday.getFullYear();
        
         var yyyyyyesterday = new Date (today);
         yyyyyyesterday.setDate(today.getDate()-6);
         var yyyyyyday = yyyyyyesterday.getDate();
         var yyyyyymonth = yyyyyyesterday.getMonth()+1;
         var yyyyyyyear = yyyyyyesterday.getFullYear();
      	 var kq= Number(<?php echo json_encode($kq->count)?>);
      	 var kq1= Number(<?php echo json_encode($kq1->count)?>) ;
      	 var kq2= Number(<?php echo json_encode($kq2->count)?>) ;
     	var kq3= Number(<?php echo json_encode($kq3->count)?>) ;
     	var kq4= Number(<?php echo json_encode($kq4->count)?>) ;
     	var kq5= Number(<?php echo json_encode($kq5->count)?>) ;
     	var kq6= Number(<?php echo json_encode($kq6->count)?>) ;

  window.onload = function () {
  	
  	
    var chart = new CanvasJS.Chart("chartContainer",
    {
      title:{
        text: "Number of covid cases in a week"    
      },
      axisY: {
        title: "amount"
      },
      legend: {
        verticalAlign: "bottom",
        horizontalAlign: "center"
      },
      data: [

      {        
        color: "#B0D0B0",
        type: "column",  
        showInLegend: true, 
        legendMarkerType: "none",
        legendText: "Date",
        dataPoints: [      
        { x: 1, y: kq, label: tyear + "/"+tmonth +"/" +tday},
        { x: 2, y: kq1,  label: yyear + "/"+ymonth +"/" +yday },
        { x: 3, y: kq2,  label: yyyear + "/"+yymonth +"/" +yyday },
        { x: 4, y: kq3,  label: yyyyear + "/"+yyymonth +"/" +yyyday},
        { x: 5, y: kq4,  label: yyyyyear + "/"+yyyymonth +"/" +yyyyday},
        { x: 6, y: kq5, label : yyyyyyear + "/"+yyyyymonth +"/" +yyyyyday},
        { x: 7, y: kq6,  label: yyyyyyyear + "/"+yyyyyymonth +"/" +yyyyyyday}
        ]
      }
      ]
    });

    chart.render();
  }
  </script>
 
  <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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
         <div id="chartContainer" style="height: 300px; width: 50%;">
    </div>
    <br/>
    <div id="piechart_3d" style="width: 30%; height: 300px;"></div>
     </div>

    </body>
</html>