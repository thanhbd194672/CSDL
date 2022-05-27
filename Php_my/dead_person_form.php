<?php
session_start();
require_once("dead_person.php");
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

    <title>Contact Form #7</title>
  </head>
  <body>
  

  <div class="content">
    
    <div class="container">
      <div class="row align-items-stretch no-gutters contact-wrap">
        <div class="col-md-8">
          <div class="form h-100">
            <h3>Người bệnh</h3>
            <form class="mb-5" method="post" id="contactForm" name="contactForm">
              <div class="row">
                <div class="col-md-6 form-group mb-5">
                  <label for="" class="Id_person">Mã người dân</label>
                  <input type="integer" class="form-control" name="Id_person" id="Id_person" placeholder="Mã người dân">
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 form-group mb-5">
                  <label for="" class="col-form-label">Ngày chết</label>
                  <input type="date" class="form-control" name="death_time" id="death_time"  placeholder="Ngày chết">
                </div>
              </div>
              
              <div class="row">
                <div class="col-md-12 form-group">
                  <input type="submit" value="Gửi" class="btn btn-primary rounded-0 py-2 px-4">
                  <span class="submitting"></span>
                </div>
                <div class="col-md-12 form-group mb-5">
                 <a href="manage_update.php">Quay lại</a>
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