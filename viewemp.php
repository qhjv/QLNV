<?php

require_once('process/dbh.php');
$sql = "SELECT * from `employee` , `rank` WHERE employee.id = rank.eid";

//echo "$sql";
$result = mysqli_query($conn, $sql);

?>



<html>

<head>
	<title>QLNV</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="styleview.css">
</head>

<body>
	<header>
		<nav>
			<h1>QLNV</h1>
			<ul id="navli">
				<li><a href="aloginwel.php">Trang chủ</a></li>
				<li><a href="addemp.php">Thêm nhân viên</a></li>
				<li><a class="homeactive" href="viewemp.php">Xem danh sách</a></li>
				<li><a href="assign.php">Thêm dự án</a></li>
				<li><a href="assignproject.php">Tình trạng dự án</a></li>
				<li><a href="salaryemp.php">Bảng lương</a></li>
				<li><a href="empleave.php">Xin nghỉ</a></li>
				<li><a class="homeLogin" href="alogin.html">Đăng xuất</a></li>
			</ul>
		</nav>
	</header>
	<div class="container" style="padding: 0 10px;">

		<table style="margin-top: 50px;">
			<tr>

				<th align="center">ID</th>
				<th align="center">Ảnh</th>
				<th align="center">Tên</th>
				<th align="center">Email</th>
				<th align="center">Ngày sinh</th>
				<th align="center">Giới tính</th>
				<th align="center">Số dt</th>
				<th align="center">Tuổi</th>
				<th align="center">Địa chỉ</th>
				<th align="center">Phòng ban</th>
				<th align="center">Trình độ hv</th>
				<th align="center">Điểm</th>


				<th align="center"></th>
			</tr>

			<?php
			while ($employee = mysqli_fetch_assoc($result)) {
				echo "<tr>";
				echo "<td>" . $employee['id'] . "</td>";
				echo "<td><img src='process/" . $employee['pic'] . "' height = 60px width = 60px></td>";
				echo "<td>" . $employee['firstName'] . " " . $employee['lastName'] . "</td>";

				echo "<td>" . $employee['email'] . "</td>";
				echo "<td>" . $employee['birthday'] . "</td>";
				echo "<td>" . $employee['gender'] . "</td>";
				echo "<td>" . $employee['contact'] . "</td>";
				echo "<td>" . $employee['nid'] . "</td>";
				echo "<td>" . $employee['address'] . "</td>";
				echo "<td>" . $employee['dept'] . "</td>";
				echo "<td>" . $employee['degree'] . "</td>";
				echo "<td>" . $employee['points'] . "</td>";

				echo "<td><a href=\"edit.php?id=$employee[id]\">Sửa</a> | <a href=\"delete.php?id=$employee[id]\" onClick=\"return confirm('Bạn có muốn xóa?')\">Xóa</a></td>";
			}


			?>

		</table>
	</div>


</body>

</html>