
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Trang chủ</title>
      <link rel="stylesheet" href="/stylesheets/main.min.css" />
      <meta http-equiv="content-type" content="text/html; charset=utf-8" />
      <link href="goitiem.css" rel="stylesheet" type="text/css" />
      <script type="text/javascript" src="js/cufon-yui.js"></script>
      <script type="text/javascript" src="js/arial.js"></script>
      <script type="text/javascript" src="js/cuf_run.js"></script>
      <link href="goitiem.css?t=[timestamp]" type="text/css" rel="stylesheet">
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
          <li><a href="goitiem.php">Gọi đi tiêm</a></li>
          <li><a href="TruybaoF.php">Truy vết theo F</a></li>
          <li><a href="khaibaogan.php">Khai báo gần</a></li>
          <li><a href="timkiem.php">Thoát</a></li>
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
     <div class = "form">
         <form method="POST" action="">
        <div class = "form-group">
          <label for = "type_of_vaccine">Loại vacxin:</label>
          <input type="text" class="form-control" id="type_of_vaccine" placeholder="Loại vacxin" name="type_of_vaccine">
        </div>
        <div class = "form-group">
          <label for = "type_of_vaccine">Khoảng cách ngày:</label>
          <input type="text" class="form-control" id="kc" placeholder="Khoảng cách ngày" name="kc">
        </div>
        <div class = "form-group">
          <label for = "times">Đã tiêm mấy lần:</label>
          <input type="integer" class="form-control" id="times" placeholder="Mũi thứ " name="times">
        </div>
        <button class="btn btn-success">accept</button>
      </div>
     
    <div class = "resize">
      <div class = "table_users"> 

      <table class = table_1>

          <tr>
            <th>Họ tên</th>
            <th>Số điện thoại</th>
            <th>Tuổi </th>
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
             $query = "SELECT U1.name_person,U1.telephone_number 
             ,EXTRACT(YEAR FROM now()) - EXTRACT(YEAR FROM U1.date_of_birth) as age
              FROM users U1 
              WHERE U1.id_person NOT IN(SELECT V1.id_person FROM vaccination V1 ); ";
             $result = pg_query($con,$query);
             $i=0;
             while($k[$i] =pg_fetch_object($result)){            
              echo '<tr>
              <td>'.$k[$i]->name_person.'</td>
              <td>'.$k[$i]->telephone_number.'</td>
              <td>'.$k[$i]->age.'</td>
             </tr>';
              $i++;

              }
            }
            pg_close($con);
        ?>  

          </tbody>
      </table>
      <table class = "table2">
        <tr>
            <th>Họ tên</th>
            <th>Số điện thoại</th>
            <th>Số ngày từ lần tiêm cuối </th>
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
            if(!empty($_POST)){
              $type_of_vaccine = $_POST['type_of_vaccine'];
              $kc = $_POST['kc']."days";
              $times = $_POST['times'];
             $query = "SELECT distinct U1.name_person,U1.telephone_number,EXTRACT(Day from (now()-V1.injection_date)) as day
              FROM vaccination V1 
              JOIN users U1 USING(id_person) 
              WHERE(V1.type_of_vaccine = '".$type_of_vaccine."' AND now() -V1.injection_date > interval '".$kc."' 
              AND (select count(*) FROM vaccination A2 WHERE A2.id_person = U1.id_person ) = ".$times." AND times = ".$times."); ";

             $result = pg_query($con,$query);
             $i=0;
             while($k[$i] =pg_fetch_object($result)){            
              echo '<tr>
              <td>'.$k[$i]->name_person.'</td>
              <td>'.$k[$i]->telephone_number.'</td>
              <td>'.$k[$i]->day.'</td>
             </tr>';
              $i++;
                }
              }
            }
            pg_close($con);
        ?>  
        </tbody>
      </table>
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
