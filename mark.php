<?php

require_once('process/dbh.php');
$id = (isset($_GET['id']) ? $_GET['id'] : '');
$pid = (isset($_GET['pid']) ? $_GET['pid'] : '');
$sql = "SELECT pid, project.eid, pname, duedate, subdate, mark, points, firstName, lastName, base, bonus, total FROM `project` , `rank` ,`employee`, `salary`  WHERE project.eid = $id AND pid = $pid";

//echo "$sql";
$result = mysqli_query($conn, $sql);
if (isset($_POST['update'])) {

  $eid = mysqli_real_escape_string($conn, $_POST['eid']);
  $pid = mysqli_real_escape_string($conn, $_POST['pid']);


  $mark = mysqli_real_escape_string($conn, $_POST['mark']);
  $points = mysqli_real_escape_string($conn, $_POST['points']);
  $base = mysqli_real_escape_string($conn, $_POST['base']);
  $bonus = mysqli_real_escape_string($conn, $_POST['bonus']);
  $total = mysqli_real_escape_string($conn, $_POST['total']);

  $upPoint = $points + $mark;

  $upBonus = $bonus +  $mark;
  $upSalary = $base + ($upBonus * $base) / 100;
  echo "$upBonus";
  echo "string";
  echo "$upSalary";

  $result = mysqli_query($conn, "UPDATE `project` SET `mark`='$mark' WHERE eid=$eid and pid = $pid");

  $result = mysqli_query($conn, "UPDATE `rank` SET `points`='$upPoint' WHERE eid=$eid");
  $result = mysqli_query($conn, "UPDATE `salary` SET `bonus`='$upBonus' ,`total`='$upSalary' WHERE id=$eid");




  echo ("<SCRIPT LANGUAGE='JavaScript'>
   
    window.location.href='assignproject.php  ';
    </SCRIPT>");
}
?>




<?php
$id = (isset($_GET['id']) ? $_GET['id'] : '');
$pid = (isset($_GET['pid']) ? $_GET['pid'] : '');
$sql1 = "SELECT pid, project.eid, project.pname, project.duedate, project.subdate, project.mark, rank.points, employee.firstName, employee.lastName, salary.base, salary.bonus, salary.total FROM `project` , `rank` ,`employee`, `salary`  WHERE project.eid = $id AND project.pid = $pid AND project.eid = rank.eid AND salary.id = project.eid AND employee.id = project.eid AND employee.id = rank.eid";
$result1 = mysqli_query($conn, $sql1);
if ($result1) {
  while ($res = mysqli_fetch_assoc($result1)) {
    $pname = $res['pname'];
    $duedate = $res['duedate'];
    $subdate = $res['subdate'];
    $firstName = $res['firstName'];
    $lastName = $res['lastName'];
    $mark = $res['mark'];
    $points = $res['points'];
    $base = $res['base'];
    $bonus = $res['bonus'];
    $total = $res['total'];
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
      <h1>QLNV</h1>
      <ul id="navli">
        <li><a href="aloginwel.php">Trang chủ</a></li>
        <li><a href="addemp.php">Thêm nhân viên</a></li>
        <li><a href="viewemp.php">Xem danh sách</a></li>
        <li><a href="assign.php">Thêm dự án</a></li>
        <li><a class="homeactive" href="assignproject.php">Tình trạnh dự án</a></li>
        <li><a href="salaryemp.php">Bảng lương</a></li>
        <li><a href="empleave.php">Xin nghỉ</a></li>
        <li><a class="homeLogin" href="alogin.html">Đăng xuất</a></li>
      </ul>
    </nav>
  </header>



  <!-- <form id = "registration" action="edit.php" method="POST"> -->
  <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
    <div class="wrapper wrapper--w680">
      <div class="card card-1">
        <div class="card-heading"></div>
        <div class="card-body">
          <h2 class="title">Theo dõi dự án</h2>
          <form id="registration" action="mark.php" method="POST">



            <div class="input-group">
              <p>Tên dự án</p>
              <input class="input--style-1" type="text" name="pname" value="<?php echo $pname; ?>" readonly>
            </div>


            <div class="input-group">
              <p>Tên nhân viên đảm nhận</p>
              <input class="input--style-1" type="text" name="firstName" value="<?php echo $firstName; ?> <?php echo $lastName; ?>" readonly>
            </div>




            <div class="row row-space">
              <div class="col-2">
                <div class="input-group">
                  <p>Ngày bắt đầu</p>
                  <input class="input--style-1" type="text" name="duedate" value="<?php echo $duedate; ?>" readonly>
                </div>
              </div>
              <div class="col-2">
                <div class="input-group">
                  <p>Ngày hoàn thành</p>
                  <input class="input--style-1" type="text" name="subdate" value="<?php echo $subdate; ?>" readonly>
                </div>
              </div>
            </div>


            <div class="input-group">
              <p>Điểm</p>
              <input class="input--style-1" type="text" name="mark" value="<?php echo $mark; ?>">
            </div>


            <input type="hidden" name="eid" id="textField" value="<?php echo $id; ?>" required="required">
            <input type="hidden" name="pid" id="textField" value="<?php echo $pid; ?>" required="required">
            <input type="hidden" name="points" id="textField" value="<?php echo $points; ?>" required="required">
            <input type="hidden" name="base" id="textField" value="<?php echo $base; ?>" required="required">
            <input type="hidden" name="bonus" id="textField" value="<?php echo $bonus; ?>" required="required">
            <input type="hidden" name="total" id="textField" value="<?php echo $total; ?>" required="required">
            <div class="p-t-20">
              <button class="btn btn--radius btn--green" type="submit" name="update">Hoàn thành</button>
            </div>

          </form>
          <br>

        </div>
      </div>
    </div>
  </div>


</body>

</html>