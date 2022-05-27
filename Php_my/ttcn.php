<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Thông tin cá nhân </title>
      <link rel="stylesheet" href="/stylesheets/main.min.css" />
      <meta http-equiv="content-type" content="text/html; charset=utf-8" />
      <link href="ttcn.css" rel="stylesheet" type="text/css" />
      <script type="text/javascript" src="js/cufon-yui.js"></script>
      <script type="text/javascript" src="js/arial.js"></script>
      <script type="text/javascript" src="js/cuf_run.js"></script>
      <link href="ttcn.css?t=[timestamp]" type="text/css" rel="stylesheet">
    <?php
		session_start();
	?>
      <?php
      $id_key = $_SESSION["id_key"];
      $host = "localhost";
      $user ="postgres";
      $pass = "root";
      $db = "New_pj";
      $con = pg_connect("host=$host port=5432 dbname=$db user=$user password=$pass") or die ("could not connect to Server\n");
      if(!$con){
        echo "Error\n";
      }else{
           	$query = "SELECT  U.*,F.address, V.times
                      FROM users U 
                      JOIN families F using (id_family) 
                      LEFT JOIN vaccination V using(id_person)
                      WHERE U.id_person = $id_key AND (V.times = (SELECT max(times) from vaccination where id_person = U.id_person) OR V.times is null);";
			$result = pg_query($con,$query);	
			$kq = pg_fetch_object($result);
      		pg_close($con);  
    }   
    ?> 
 
  
    <script type="text/javascript">
      

        var kq= <?php echo json_encode($kq->name_person)?> ;
    	 var kq1 = <?php echo json_encode($kq->national_id_number)?>;
        var kq2 = <?php echo json_encode($kq->health_insurance)?> ;
        var kq3 = <?php echo json_encode($kq->date_of_birth)?>;
        var kq4 = <?php echo json_encode($kq->nationality)?> ;
        var kq5 = <?php echo json_encode($kq->telephone_number)?>;
        var kq6 = <?php echo json_encode($kq->state_person)?>;
        var kq7 = <?php echo json_encode($kq->gender)?>;
        var kq8 = <?php echo json_encode($kq->times)?>;
    </script>

    
  </head>


<body>
<div class="main">
  <div class="header">
    <div class="header_resize">
      <div class="logo">
        <h1><a href="users.php">Quản lí thông tin covid 
          <small>Phường Hai Bà Trưng </small></a></h1>
      </div>
      <br/>
      <div class="menu_nav">
        <ul>
          <li><a href="users.php">Trang chủ</a></li>
          <li><a href="kb_form.php">Khai báo</a></li>
          <li><a href="ttcn.php">Thông tin cá nhân</a></li>
          <li><a href="hp.php">Đăng xuất</a></li>
        </ul>
      </div>
      <div class="clr"></div>
      <div class="htext">
        <h2>Xin chào bạn  <script>document.write(kq)</script></h2>
        <p><strong>Trang web được lập ra với mục đích giúp phòng chống, quản lý thông tin covid, giúp người dân tiếp cận nguồn thông tin dễ dàng, chính xác, tin cậy..</strong></p>
        <p>Sản phẩm của nhóm sinh viên đại học Bách Khoa Hà Nội.</p>
        
      </div>
      <div class="clr"></div>
    </div>


  </div>
   
  <div class="content">
    <div class="content_resize">
      <div class="mainbar">
        <div class="article">
         
            <h2 id ="tt_table">Thông tin:</h2>
        
    <div>
      <table id = "table">
  
        <tr>
          <td id = "col1">Họ và tên : <script type="text/javascript">document.write(kq)</script></td>
          <td id ="col2">Số CMND : <script type="text/javascript">document.write(kq1)</script></td>
        
        </tr>
        <tr>
          <td id = "col1">BHYT : <script type="text/javascript">document.write(kq2)</script></td>
          <td id ="col2">Ngày sinh : <script type="text/javascript">document.write(kq3)</script></td>
          
        </tr>
        <tr>
          <td id = "col1">Quốc tịch : <script type="text/javascript">document.write(kq4)</script></td>
          <td id ="col2">Số điện thoại : <script type="text/javascript">document.write(kq5)</script></td>
         
        </tr>
        <tr>
          <td id = "col1">Trạng thái :F<script type="text/javascript">document.write(kq6)</script></td>
          <td id ="col2">Giới tính : <script type="text/javascript">document.write(kq7)</script></td>
          
        </tr>
        <tr>
          <td id = "col1">Đã tiêm : <script type="text/javascript">document.write(kq8)</script> lần</td>
        </tr>

      </table>

    
      </div>
    </div>
        
  </div>
  </div>

      <div class="sidebar">
        <div class="gadget">
          <img src ="images/avatar.gif"></div>
        </div>
      </div>
      <div class="clr"></div>
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
