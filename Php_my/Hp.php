<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Trang chủ</title>
      <link rel="stylesheet" href="/stylesheets/main.min.css" />
      <meta http-equiv="content-type" content="text/html; charset=utf-8" />
      <link href="hp.css" rel="stylesheet" type="text/css" />
      <script type="text/javascript" src="js/cufon-yui.js"></script>
      <script type="text/javascript" src="js/arial.js"></script>
      <script type="text/javascript" src="js/cuf_run.js"></script>
      <link href="hp.css?t=[timestamp]" type="text/css" rel="stylesheet">
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

           
        }
           $query_infected_all = "SELECT  count(*)  FROM infected I1 WHERE I1.times = 1;";
           $result_infected_all = pg_query($con,$query_infected_all);
           $kq_infected_all = pg_fetch_object($result_infected_all);

           $query_cured_all = "SELECT  people_recovered_from_covid() as count ;";
           $result_cured_all = pg_query($con,$query_cured_all);
           $kq_cured_all = pg_fetch_object($result_cured_all);

           $query_death_all = "SELECT COUNT (*) FROM users WHERE death_time is not null;";
           $result_death_all = pg_query($con,$query_death_all);
           $kq_death_all = pg_fetch_object($result_death_all);

           $query_vaccine = "SELECT  count(distinct id_person)  FROM vaccination;";
           $result_vaccine = pg_query($con,$query_vaccine);
           $kq_vaccine = pg_fetch_object($result_vaccine);

           $query_not_vaccine = "SELECT count(*)
              FROM users U 
              where (U.id_person not in (SELECT  distinct id_person  FROM vaccination))";
           $result_not_vaccine = pg_query($con,$query_not_vaccine);
           $kq_not_vaccine = pg_fetch_object($result_not_vaccine);
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

        var kq21= Number(<?php echo json_encode($kq_infected_all->count)?>);
        var kq22= Number(<?php echo json_encode($kq_cured_all->count)?>);
        var kq23= Number(<?php echo json_encode($kq_death_all->count)?>);
        var kq24= Number(<?php echo json_encode($kq_vaccine->count)?>);
        var kq25= Number(<?php echo json_encode($kq_not_vaccine->count)?>);

  </script>  

  <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  
    <script type="text/javascript">
      

      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Ngày', 'Nhiễm bệnh', 'Khỏi bệnh', 'Tử vong'],
          [yyyyyyday + "/"+yyyyyymonth +"/" +yyyyyyyear, kq6, kq13, kq20],
          [yyyyyday + "/"+yyyyymonth +"/" +yyyyyyear, kq5, kq12, kq19],
          [yyyyday + "/"+yyyymonth +"/" +yyyyyear, kq4, kq11, kq18],
          [yyyday + "/"+yyymonth +"/" +yyyyear,kq3, kq10, kq17],
          [yyday + "/"+yymonth +"/" +yyyear , kq2, kq9, kq16],
          [yday + "/"+ymonth +"/" +yyear , kq1, kq8, kq15],
          [tday + "/"+tmonth +"/" +tyear, kq, kq7, kq14]
        ]);

        var options = {
          bars: 'vertical',
          vAxis: {format: 'decimal'},
          height: 400,
          colors: ['#FFA500', '#00FA9A', '#A52A2A']
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
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
        <h2>Lời nói đầu ....</h2>
        <p><strong>Trang web được lập ra với mục đích giúp phòng chống, quản lý thông tin covid, giúp người dân tiếp cận nguồn thông tin dễ dàng, chính xác, tin cậy..</strong></p>
        <p>Sản phẩm của nhóm sinh viên đại học Bách Khoa Hà Nội.</p>
        
      </div>
      <div class="clr"></div>
    </div>
  </div>
   
    <div class="feature-layout">
            <div class="feature-item">
                <h2>Số ca nhiễm bệnh</h2>
                <p id ="a">Hôm nay: <script type="text/javascript">  
                document.write(kq);
                </script>
                </script>
                &emsp;Trên toàn khu vực:
                <script type="text/javascript">  
                document.write(kq21);
                </script>
                </p>
            </div>
            <div class="feature-item">
                <h2>Số ca khỏi bệnh</h2>
                <p id = "a">Hôm nay: <script type="text/javascript">  
                document.write(kq7);
                </script>
                &emsp;Trên toàn khu vực:
                <script type="text/javascript">  
                document.write(kq22);
                </script>
                </p>
            </div>
            <div class="feature-item">
                <h2 id= "w">Số ca tử vong</h2>
                <p id ="a1">Hôm nay: <script type="text/javascript">  
                document.write(kq14);
                </script>
                &emsp;Trên toàn khu vực:
                <script type="text/javascript">  
                document.write(kq23);
                </script>
                </p>

            </div>
        </div>

       
  <div id = "chart_title"> 
      <h2>Tổng quan</h2>
      <p>Nhiễm bệnh ,Khỏi bệnh ,Tử vong 7 ngày đã qua</p>
  </div>

  <div id="columnchart_material" style="width: 800px; height: 500px;"></div>
  
  <div class="feature-layout">
            <div class="feature-item1">
                <h2>Số người dân được tiêm</h2>
                <p id ="a"> <script type="text/javascript">document.write(kq24)</script>
                người</p>
            </div>
            <div class="feature-item1">
                <h2>Số người chưa được tiêm</h2>
                <p id ="a"> <script type="text/javascript">document.write(kq25)</script>
                người</p>
            </div>
        </div>
        
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
