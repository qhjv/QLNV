<!DOCTYPE html>
<html>

<head>


    <!-- Title Page-->
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
                <li><a class="homeblack" href="aloginwel.php">Trang chủ</a></li>
                <li><a class="homeblack" href="addemp.php">Thêm nhân viên</a></li>
                <li><a class="homeblack" href="viewemp.php">Xem danh sách</a></li>
                <li><a class="homeactive" href="assign.php">Thêm dự án</a></li>
                <li><a class="homeblack" href="assignproject.php">Tình trạng dự án</a></li>
                <li><a class="homeblack" href="salaryemp.php">Bảng lương</a></li>
                <li><a class="homeblack" href="empleave.php">Xin nghỉ</a></li>
                <li><a class="homeLogin" href="alogin.html">Đăng xuất</a></li>
            </ul>
        </nav>
    </header>





    <div class="page-wrapper bg-blue p-b-100 font-robo" style="padding-top:50px ;">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Thêm dự án</h2>
                    <form action="process/assignp.php" method="POST" enctype="multipart/form-data">




                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="ID nhân viên nhận dự án" name="eid" required="required">
                        </div>





                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Tên dự án" name="pname" required="required">
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="date" placeholder="date" name="duedate" required="required">

                                </div>
                            </div>

                        </div>





                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit">Thêm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body>

</html>
<!-- end document-->