<?php

require_once('process/dbh.php');
$sql = "SELECT employee.id,employee.firstName,employee.lastName,salary.base,salary.bonus,salary.total from employee,`salary` where employee.id=salary.id";

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
				<li><a href="assignproject.php">Tình trạnh dự án</a></li>
				<li><a href="salaryemp.php" class="homeactive">Bảng lương</a></li>
				<li><a href="empleave.php">Xin nghỉ</a></li>
				<li><a class="homeLogin" href="alogin.html">Đăng xuất</a></li>
			</ul>
		</nav>
	</header>
	<div id="divimg">

	</div>
	<div class="container" style="margin-top:50px;padding:0 10px">

		<table>
			<tr>
				<th align="center">ID</th>
				<th align="center">Tên nhân viên</th>


				<th align="center">Lương cứng</th>
				<th align="center">Bonus</th>
				<th align="center">Tổng tiền</th>


			</tr>

			<?php
			while ($employee = mysqli_fetch_assoc($result)) {
				echo "<tr>";
				echo "<td>" . $employee['id'] . "</td>";
				echo "<td>" . $employee['firstName'] . " " . $employee['lastName'] . "</td>";

				echo "<td>" . $employee['base'] . "</td>";
				echo "<td>" . $employee['bonus'] . " %</td>";
				echo "<td>" . $employee['total'] . "</td>";
			}


			?>

		</table>
	</div>
</body>

</html>