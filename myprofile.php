<?php

require_once('process/dbh.php');
$sql = "SELECT * FROM `employee` WHERE 1";

//echo "$sql";
$result = mysqli_query($conn, $sql);


$id = (isset($_GET['id']) ? $_GET['id'] : '');
$sql = "SELECT * from `employee` WHERE id=$id";
$sql2 = "SELECT total from `salary` WHERE id = $id";
$result = mysqli_query($conn, $sql);
$result2 = mysqli_query($conn, $sql2);
$salary = mysqli_fetch_array($result2);
$empS = ($salary['total']);

if ($result) {
  while ($res = mysqli_fetch_assoc($result)) {
    $firstname = $res['firstName'];
    $lastname = $res['lastName'];
    $email = $res['email'];
    $contact = $res['contact'];
    $address = $res['address'];
    $gender = $res['gender'];
    $birthday = $res['birthday'];
    $nid = $res['nid'];
    $dept = $res['dept'];
    $degree = $res['degree'];
    $pic = $res['pic'];
  }
}

?>

<html>

<head>
  <title>QLNV</title>
  <meta charset="utf-8" />
  <!-- Icons font CSS-->
  <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
  <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
  <!-- Font special for pages-->
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

  <!-- Vendor CSS-->
  <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
  <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

  <!-- Main CSS-->
  <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
  <header>
    <nav>
      <h1>Nhân viên QH</h1>
      <ul id="navli">
        <li><a href="eloginwel.php?id=<?php echo $id ?>"">Trang chủ</a></li>
				<li><a class=" homeactive" href=" myprofile.php?id=<?php echo $id ?>"">Hồ sơ cá nhân</a></li>
				<li><a href=" empproject.php?id=<?php echo $id ?>"">Dự án</a></li>
        <li><a href=" applyleave.php?id=<?php echo $id ?>">Xin nghỉ</a></li>
        <li><a class=" homeLogin" href="elogin.html">Đăng xuất</a></li>
      </ul>
    </nav>
  </header>


  <!-- <form id = "registration" action="edit.php" method="POST"> -->
  <div class="page-wrapper bg-blue  p-b-100 font-robo" style="padding:50px 0">
    <div class="wrapper wrapper--w680">
      <div class="card card-1">
        <div class="card-heading"></div>
        <div class="card-body">
          <h2 class="title">Thông tin</h2>
          <form method="POST" action="myprofileup.php?id=<?php echo $id ?>">

            <div class="input-group">
              <img src="process/<?php echo $pic; ?>" height=150px width=150px>
            </div>


            <div class="row row-space">
              <div class="col-2">
                <div class="input-group">
                  <p>Họ</p>
                  <input class="input--style-1" type="text" name="firstName" value="<?php echo $firstname; ?>" readonly>
                </div>
              </div>
              <div class="col-2">
                <div class="input-group">
                  <p>Tên</p>
                  <input class="input--style-1" type="text" name="lastName" value="<?php echo $lastname; ?>" readonly>
                </div>
              </div>
            </div>





            <div class="input-group">
              <p>Email</p>
              <input class="input--style-1" type="email" name="email" value="<?php echo $email; ?>" readonly>
            </div>
            <div class="row row-space">
              <div class="col-2">
                <div class="input-group">
                  <p>Ngày sinh</p>
                  <input class="input--style-1" type="text" name="birthday" value="<?php echo $birthday; ?>" readonly>

                </div>
              </div>
              <div class="col-2">
                <div class="input-group">
                  <p>Gới tính</p>
                  <input class="input--style-1" type="text" name="gender" value="<?php echo $gender; ?>" readonly>
                </div>
              </div>
            </div>

            <div class="input-group">
              <p>Số điện thoại</p>
              <input class="input--style-1" type="number" name="contact" value="<?php echo $contact; ?>" readonly>
            </div>

            <div class="input-group">
              <p>Tuổi</p>
              <input class="input--style-1" type="number" name="nid" value="<?php echo $nid; ?>" readonly>
            </div>


            <div class="input-group">
              <p>Địa chỉ</p>
              <input class="input--style-1" type="text" name="address" value="<?php echo $address; ?>" readonly>
            </div>

            <div class="input-group">
              <p>Phòng ban</p>
              <input class="input--style-1" type="text" name="dept" value="<?php echo $dept; ?>" readonly>
            </div>

            <div class="input-group">
              <p>Trình độ học vấn</p>
              <input class="input--style-1" type="text" name="degree" value="<?php echo $degree; ?>" readonly>
            </div>


            <div class="input-group">
              <p>Lương</p>
              <input class="input--style-1" type="text" name="degree" value="<?php echo $empS; ?>" readonly>
            </div>

            <input type="hidden" name="id" id="textField" value="<?php echo $id; ?>" required="required"><br><br>


          </form>
        </div>
      </div>
    </div>
  </div>


  <!-- Jquery JS-->
  <!-- <script src="vendor/jquery/jquery.min.js"></script>
   
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

   
    <script src="js/global.js"></script> -->
</body>

</html>