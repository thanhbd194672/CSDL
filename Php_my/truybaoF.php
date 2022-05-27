
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Trang chủ</title>
      <link rel="stylesheet" href="/stylesheets/main.min.css" />
      <meta http-equiv="content-type" content="text/html; charset=utf-8" />
      <link href="truybaoF.css" rel="stylesheet" type="text/css" />
      <script type="text/javascript" src="js/cufon-yui.js"></script>
      <script type="text/javascript" src="js/arial.js"></script>
      <script type="text/javascript" src="js/cuf_run.js"></script>
      <link href="truybaoF.css?t=[timestamp]" type="text/css" rel="stylesheet">
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
          <li><a href="truybaoF.php">Truy vết theo F</a></li>
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
          <label for = "state_person">Trạng thái:</label>
          <input type="integer" class="form-control" id="state_person" placeholder="Trạng thái" name="state_person">
        </div>
        <button class="btn btn-success">accept</button>
      </div>
        
    
    
  </form> 
    <div class = "table_users"> 

      <table>
          <tr>
            <th>Họ tên</th>
            <th>Số điện thoại</th>
            <th>Nghi nhiễm </th>
            <th>Thời gian khai báo</th>
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
              $state_person = $_POST['state_person'];
            
             $query = "SELECT U1.name_person, U1.telephone_number,H1.possible_covid,H1.time_declaration 
              FROM users U1 JOIN health_declaration H1 using(id_person) 
              WHERE(H1.time_declaration = 
              (SELECT MAX(time_declaration )FROM health_declaration H2 GROUP BY (H2.id_person) 
              HAVING H1.id_person = H2.id_person)AND possible_covid= '".$state_person."');";
             $result = pg_query($con,$query);
             $i=0;
             while($k[$i] =pg_fetch_object($result)){            
              echo '<tr>
              <td>'.$k[$i]->name_person.'</td>
              <td>'.$k[$i]->telephone_number.'</td>
              <td>F'.$k[$i]->possible_covid.'</td>
              <td>'.$k[$i]->time_declaration.'</td>
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
