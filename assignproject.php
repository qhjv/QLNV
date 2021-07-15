<?php

require_once('process/dbh.php');
$sql = "SELECT * from `project` order by subdate desc";

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
				<li><a href="viewemp.php">Xem danh sách</a></li>
				<li><a href="assign.php">Thêm dự án</a></li>
				<li><a class="homeactive" href="assignproject.php">Tình trạnh dự án</a></li>
				<li><a href="salaryemp.php">Bảng lương</a></li>
				<li><a href="empleave.php">Xin nghỉ</a></li>
				<li><a class="homeLogin" href="alogin.html">Đăng xuất</a></li>
			</ul>
		</nav>
	</header>
	<div class="container" style="margin-top: 50px;padding:0 10px">

		<table>
			<tr>

				<th align="center">ID dự án</th>
				<th align="center">ID nhân viên</th>
				<th align="center">Tên dự án</th>
				<th align="center">Ngày bắt đầu</th>
				<th align="center">Ngày hoàn thành</th>
				<th align="center">Điểm</th>
				<th align="center">Trạng thái</th>
				<th align="center"></th>

			</tr>

			<?php
			while ($employee = mysqli_fetch_assoc($result)) {
				echo "<tr>";
				echo "<td>" . $employee['pid'] . "</td>";
				echo "<td>" . $employee['eid'] . "</td>";
				echo "<td>" . $employee['pname'] . "</td>";
				echo "<td>" . $employee['duedate'] . "</td>";
				echo "<td>" . $employee['subdate'] . "</td>";
				echo "<td>" . $employee['mark'] . "</td>";
				echo "<td>" . $employee['status'] . "</td>";
				echo "<td><a href=\"mark.php?id=$employee[eid]&pid=$employee[pid]\">Xem</a>";
			}


			?>

		</table>
	</div>


</body>

</html>