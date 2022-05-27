<?php
session_start();
require_once("kb.php");
// insert();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css_form_declare/style.css">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css_form_declare/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="css_form_declare/kb.css">

    <title>Khai báo cá nhân</title>
  </head>
  <body>
  

  <div class="content">
    
    <div class="container">
      <div class="row align-items-stretch no-gutters contact-wrap">
        <div class="col-md-8">
          <div class="form h-100">
            <h3>Khai báo</h3>
            <form class="mb-5" method="post" id="contactForm" name="contactForm">
              <div class="row">
                <div class="col-md-6 form-group mb-5">
                  <label for="" class="col-form-label">Triệu chứng</label>
                  <input type="text" class="form-control" name="symptoms" id="symptoms" placeholder="Triệu chứng">
                </div>
                <div class="col-md-6 form-group mb-5">
                  <label for="" class="col-form-label">Địa chỉ hiện tại</label>
                  <input type="text" class="form-control" name="current_address" id="current_address"  placeholder="Địa chỉ hiện tại">
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 form-group mb-5">
                  <label for="" class="col-form-label">Có đến từ nơi có vùng dịch</label>
                  <input type="text" class="form-control" name="come_from_danger_area" id="come_from_danger_area"  placeholder="Có đến từ nơi có vùng dịch">
                </div>
                <div class="col-md-6 form-group mb-5">
                  <label for="" class="col-form-label">Nghi nhiễm F</label>
                  <input type="text" class="form-control" name="possible_covid" id="possible_covid"  placeholder="Nghi nhiễm F">
                </div>
              </div>

              
              <div class="row">
                <div class="col-md-12 form-group">
                  <input type="submit" value="Gửi" class="btn btn-primary rounded-0 py-2 px-4">
                  <span class="submitting"></span>
                </div>
                <div class="col-md-12 form-group mb-5">
                 <a href="users.php">Quay lại</a>
                </div>
              </div>
            </form>
            </div>
            
        </div>
        <div class="col-md-4">
          <div class="contact-info h-100">
            <h3>Chú ý</h3>
            <p class="mb-5">Khai báo y tế hoàn toàn dựa trên ý thức tự giác của người dân. Khai báo chính xác để chung tay đẩy lùi covid-19.<br>Mọi thắc mắc xin liên hệ tới</p>
            <ul class="list-unstyled">
              <li class="d-flex">
                <span class="wrap-icon icon-room mr-3"></span>
                <span class="text">Địa chỉ: Số 1 Đại Cồ Việt - Hai Bà Trưng - Hà Nội </span>
              </li>
              <li class="d-flex">
                <span class="wrap-icon icon-phone mr-3"></span>
                <span class="text">Đường dây nóng: 1900 9095</span>
              </li>
              <li class="d-flex">
                <span class="wrap-icon icon-envelope mr-3"></span>
                <span class="text">Địa chỉ hòm thư: covid19@suckhoedoisong.vn</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>

  </div>
    
    

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/main.js"></script>

  </body>
</html>