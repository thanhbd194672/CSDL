<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Thống kê</title>
      <link rel="stylesheet" href="/stylesheets/main.min.css" />
      <meta http-equiv="content-type" content="text/html; charset=utf-8" />
      <link href="tk.css" rel="stylesheet" type="text/css" />
      <script type="text/javascript" src="js/cufon-yui.js"></script>
      <script type="text/javascript" src="js/arial.js"></script>
      <script type="text/javascript" src="js/cuf_run.js"></script>
      <link href="tk.css?t=[timestamp]" type="text/css" rel="stylesheet">
    <?php
      $host = "localhost";
      $user ="postgres";
      $pass = "root";
      $db = "New_pj";
      $con = pg_connect("host=$host port=5432 dbname=$db user=$user password=$pass") or die ("could not connect to Server\n");
      if(!$con){
        echo "Error\n";
      }else{
        for($i=0;$i<7;$i++){
           $query_infected = "SELECT  people_infected_by_day (CURRENT_DATE-$i) as count;";
           $result_infected = pg_query($con,$query_infected);
           $kq_infected[$i] = pg_fetch_object($result_infected);

           $query_cured = "SELECT  people_cure_by_day (CURRENT_DATE-$i) as count;";
           $result_cured = pg_query($con,$query_cured);
           $kq_cured[$i] = pg_fetch_object($result_cured);

           $query_death = "SELECT  people_death_by_day (CURRENT_DATE-$i) as count;";
           $result_death = pg_query($con,$query_death);
           $kq_death[$i] = pg_fetch_object($result_death);

           $query_infected_avg = "SELECT people_infected_avg_7(CURRENT_DATE-6-$i,CURRENT_DATE-$i) as avg;";
           $result_infected_avg = pg_query($con,$query_infected_avg);
           $kq_infected_avg[$i] = pg_fetch_object($result_infected_avg);

           $query_cure_avg = "SELECT people_cure_avg_7(CURRENT_DATE-6-$i,CURRENT_DATE-$i) as avg;";
           $result_cure_avg = pg_query($con,$query_cure_avg);
           $kq_cure_avg[$i] = pg_fetch_object($result_cure_avg);

           $query_death_avg = "SELECT people_death_avg_7(CURRENT_DATE-6-$i,CURRENT_DATE-$i) as avg;";
           $result_death_avg = pg_query($con,$query_death_avg);
           $kq_death_avg[$i] = pg_fetch_object($result_death_avg);
        }
          $query_in_vac = 
          "SELECT * FROM statistics_vaccine('{verocell,astrazeneca,moderna,pfizer}');";
          $result_in_vac = pg_query($con,$query_in_vac);
          for($i=0;$i<4;$i++){
            $kq_in_vac[$i] = pg_fetch_object($result_in_vac);
          }
          $query_out_vac = 
          "SELECT * FROM statistics_vaccine_NOT('{verocell,astrazeneca,moderna,pfizer}');";
          $result_out_vac = pg_query($con,$query_out_vac);
          $kq_out_vac = pg_fetch_object($result_out_vac);
        
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

          var kq= Number(<?php echo json_encode($kq_infected[0]->count)?>);
        var kq1= Number(<?php echo json_encode($kq_infected[1]->count)?>);
        var kq2= Number(<?php echo json_encode($kq_infected[2]->count)?>);
        var kq3= Number(<?php echo json_encode($kq_infected[3]->count)?>);
        var kq4= Number(<?php echo json_encode($kq_infected[4]->count)?>);
        var kq5= Number(<?php echo json_encode($kq_infected[5]->count)?>);
        var kq6= Number(<?php echo json_encode($kq_infected[6]->count)?>);

        var kq7= Number(<?php echo json_encode($kq_cured[0]->count)?>);
        var kq8= Number(<?php echo json_encode($kq_cured[1]->count)?>);
        var kq9= Number(<?php echo json_encode($kq_cured[2]->count)?>);
        var kq10= Number(<?php echo json_encode($kq_cured[3]->count)?>);
        var kq11= Number(<?php echo json_encode($kq_cured[4]->count)?>);
        var kq12= Number(<?php echo json_encode($kq_cured[5]->count)?>);
        var kq13= Number(<?php echo json_encode($kq_cured[6]->count)?>);

        var kq14= Number(<?php echo json_encode($kq_death[0]->count)?>);
        var kq15= Number(<?php echo json_encode($kq_death[1]->count)?>);
        var kq16= Number(<?php echo json_encode($kq_death[2]->count)?>);
        var kq17= Number(<?php echo json_encode($kq_death[3]->count)?>);
        var kq18= Number(<?php echo json_encode($kq_death[4]->count)?>);
        var kq19= Number(<?php echo json_encode($kq_death[5]->count)?>);
        var kq20= Number(<?php echo json_encode($kq_death[6]->count)?>);

         var kq21= Number(<?php echo json_encode($kq_infected_avg[0]->avg)?>) ;
         var kq22= Number(<?php echo json_encode($kq_infected_avg[1]->avg)?>) ;
         var kq23= Number(<?php echo json_encode($kq_infected_avg[2]->avg)?>) ;
         var kq24= Number(<?php echo json_encode($kq_infected_avg[3]->avg)?>) ;
         var kq25= Number(<?php echo json_encode($kq_infected_avg[4]->avg)?>) ;
         var kq26= Number(<?php echo json_encode($kq_infected_avg[5]->avg)?>) ;
         var kq27= Number(<?php echo json_encode($kq_infected_avg[6]->avg)?>) ;

         var kq28= Number(<?php echo json_encode($kq_cure_avg[0]->avg)?>) ;
         var kq29= Number(<?php echo json_encode($kq_cure_avg[1]->avg)?>) ;
         var kq30= Number(<?php echo json_encode($kq_cure_avg[2]->avg)?>) ;
         var kq31= Number(<?php echo json_encode($kq_cure_avg[3]->avg)?>) ;
         var kq32= Number(<?php echo json_encode($kq_cure_avg[4]->avg)?>) ;
         var kq33= Number(<?php echo json_encode($kq_cure_avg[5]->avg)?>) ;
         var kq34= Number(<?php echo json_encode($kq_cure_avg[6]->avg)?>) ;

         var kq35= Number(<?php echo json_encode($kq_death_avg[0]->avg)?>) ;
         var kq36= Number(<?php echo json_encode($kq_death_avg[1]->avg)?>) ;
         var kq37= Number(<?php echo json_encode($kq_death_avg[2]->avg)?>) ;
         var kq38= Number(<?php echo json_encode($kq_death_avg[3]->avg)?>) ;
         var kq39= Number(<?php echo json_encode($kq_death_avg[4]->avg)?>) ;
         var kq40= Number(<?php echo json_encode($kq_death_avg[5]->avg)?>) ;
         var kq41= Number(<?php echo json_encode($kq_death_avg[6]->avg)?>) ;

         var kq42= <?php echo json_encode($kq_in_vac[0]->type_of_vaccine)?> ;
         var kq43 = Number(<?php echo json_encode($kq_in_vac[0]->count)?>);
         var kq44 = <?php echo json_encode($kq_in_vac[1]->type_of_vaccine)?> ;
         var kq45 = Number(<?php echo json_encode($kq_in_vac[1]->count)?>);
         var kq46 = <?php echo json_encode($kq_in_vac[2]->type_of_vaccine)?> ;
         var kq47 = Number(<?php echo json_encode($kq_in_vac[2]->count)?>);
         var kq48 = (<?php echo json_encode($kq_in_vac[3]->type_of_vaccine)?>);
         var kq49 = Number(<?php echo json_encode($kq_in_vac[3]->count)?>);
         var kq50 = Number(<?php echo json_encode($kq_out_vac->count)?>);
       
  </script>  


<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
 
     <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
          ['Ngày', 'Nhiễm bệnh', 'Trung bình'],
          [yyyyyyday + "/"+yyyyyymonth +"/" +yyyyyyyear, kq6, kq27],
          [yyyyyday + "/"+yyyyymonth +"/" +yyyyyyear, kq5, kq26],
          [yyyyday + "/"+yyyymonth +"/" +yyyyyear, kq4, kq25],
          [yyyday + "/"+yyymonth +"/" +yyyyear, kq3, kq24],
          [yyday + "/"+yymonth +"/" +yyyear , kq2, kq23],
          [yday + "/"+ymonth +"/" +yyear , kq1, kq22],
          [tday + "/"+tmonth +"/" +tyear, kq, kq21]
      ]);

        var options = {
          title : 'Thống kê số ca bệnh Covid so với trung bình 7 ngày',
        
          hAxis: {title: 'Ngày'},
          bar: {groupWidth: "30%"},
          seriesType: 'bars',
          series: {1: {type: 'line'}},
          colors: ['#00FA9A','#B22222']

        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
          ['Ngày', 'Khỏi bệnh', 'Trung bình'],
          [yyyyyyday + "/"+yyyyyymonth +"/" +yyyyyyyear, kq13, kq34],
          [yyyyyday + "/"+yyyyymonth +"/" +yyyyyyear, kq12, kq33],
          [yyyyday + "/"+yyyymonth +"/" +yyyyyear, kq11, kq32],
          [yyyday + "/"+yyymonth +"/" +yyyyear, kq10, kq31],
          [yyday + "/"+yymonth +"/" +yyyear , kq9, kq30],
          [yday + "/"+ymonth +"/" +yyear , kq8, kq29],
          [tday + "/"+tmonth +"/" +tyear, kq7, kq28]
      ]);

        var options = {
          title : 'Thống kê số ca bệnh khỏi so với trung bình 7 ngày',
        
          hAxis: {title: 'Ngày'},
          bar: {groupWidth: "30%"},
          seriesType: 'bars',
          series: {1: {type: 'line'}},
          colors: ['#FFA500','#B22222']
        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_div1'));
        chart.draw(data, options);
      }
    </script>

    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
          ['Ngày', 'Tử vong', 'Trung bình'],
          [yyyyyyday + "/"+yyyyyymonth +"/" +yyyyyyyear, kq20, kq41],
          [yyyyyday + "/"+yyyyymonth +"/" +yyyyyyear, kq19, kq40],
          [yyyyday + "/"+yyyymonth +"/" +yyyyyear, kq18, kq39],
          [yyyday + "/"+yyymonth +"/" +yyyyear, kq17, kq38],
          [yyday + "/"+yymonth +"/" +yyyear , kq16, kq37],
          [yday + "/"+ymonth +"/" +yyear , kq15, kq36],
          [tday + "/"+tmonth +"/" +tyear, kq14, kq35]
      ]);

        var options = {
          title : 'Thống kê số ca tử vong so với trung bình 7 ngày',
          hAxis: {title: 'Ngày'},
          bar: {groupWidth: "30%"},
          seriesType: 'bars',
          series: {1: {type: 'line'}},
          colors: ['#A52A2A','#000000']
        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_div2'));
        chart.draw(data, options);
      }
    </script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          [kq42,     kq43],
          [kq44,      kq45],
          [kq46,kq47],
          [kq48,kq49],
          ['Other', kq50]
          
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
<div class="main">
  <div class="header">
    <div class="header_resize">
      <div class="logo">
        <h1><a href="hp.php">Quản lí thông tin covid 
          <small>Phường Hai Bà Trưng </small></a></h1>
      </div>
      <br/>
      <div class="menu_nav">
        <ul>
          <li><a href="hp.php">Trang chủ</a></li>
          <li><a href="tk.php">Thống kê</a></li>
          <li><a href="login.html">Đăng nhập</a></li>
        </ul>
      </div>
      <div class="clr"></div>
      <div class="htext">
        <h2></h2>
        <p><strong>Trang web được lập ra với mục đích giúp phòng chống, quản lý thông tin covid, giúp người dân tiếp cận nguồn thông tin dễ dàng, chính xác, tin cậy..</strong></p>
        <p>Sản phẩm của nhóm sinh viên đại học Bách Khoa Hà Nội.</p>
        
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div id="chart_div" style="width: 900px; height: 500px;"></div>
  <div id="chart_div1" style="width: 900px; height: 500px;"></div>
  <div id="chart_div2" style="width: 900px; height: 500px;"></div>
  <div id="piechart_3d" style="width: 30%; height: 300px;"></div>
  <div class="fbg">
    <div class="fbg_resize">
      <div class="col c1">
        <h2><span>Địa chỉ liên hệ</span></h2>
        <img src="images/white.jpg" width="40" height="56" alt="" />
        <p>
        Địa chỉ : Số 1 Đại Cồ Việt - Quận Hai Bà Trưng - Hà Nội <br>
        Đường dây nóng : 1900 9095 <br> <br>
        Địa chỉ Email : covid19@suckhoedoisong.vn <br><a href="#">Trở lại trang chủ</a></p>
      </div>
      <div class="col c2">
        <h2><span>&nbsp;&nbsp;&nbsp;&nbsp;</span></h2>
        </ul>
      </div>
      <div class="col c3">
        <h2><span>Nhóm thực hiện dự án</span></h2>
        <p>
          Sinh Viên Đại học Bách Khoa Hà Nội <br>
          Bùi Duy Thành <br>
          Vũ Thành Trung <br>
          Phạm Minh Đức  <br>
          <a href = "https://www.facebook.com/vuthanh.trung.144"><img src="images/fb_icon.jpg" width="40" height="40" alt="" /></a>
          <a href = "https://twitter.com/TrungVT23"><img src="images/twitter.jpg" width="40" height="40" alt="" /></a>
          <a href = "https://www.instagram.com/trungvt_235/"><img src="images/instagram.jpg" width="40" height="40" alt="" /></a>
          </p>
      </div>
      <div class="clr"></div>
    </div>
  </div>

  <div class="footer">
    <div class="footer_resize">
      <p class="lf">Copyright &copy; <a href="#">Domain Name</a>. All Rights Reserved</p>
      <p class="rf">Design by <a target="_blank" href="https://www.facebook.com/thanhduy5.dz">Team13</a></p>
      <div class="clr"></div>
    </div>
  </div>
</div>
</body>
</html>
