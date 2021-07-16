<?php
//bao gồm tệp kết nối cơ sở dữ liệu
include("process/dbh.php");

//nhận id của dữ liệu từ url
$id = $_GET['id'];
$token = $_GET['token'];

//xóa hàng khỏi bảng
$result = mysqli_query($conn, "UPDATE `employee_leave` SET `status`='Chấp nhận' WHERE id = $id AND token = $token;");

//chuyển hướng đến trang hiển thị (index.php in our case)
header("Location:empleave.php");
