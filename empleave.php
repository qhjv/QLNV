<?php

require_once('process/dbh.php');

//$sql = "SELECT * from `employee_leave`";
$sql = "Select employee.id, employee.firstName, employee.lastName, employee_leave.start, employee_leave.end, employee_leave.reason, employee_leave.status, employee_leave.token From employee, employee_leave Where employee.id = employee_leave.id order by employee_leave.token";

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
				<li><a href="salaryemp.php">Bảng lương</a></li>
				<li><a href="empleave.php" class="homeactive">Xin nghỉ</a></li>
				<li><a class="homeLogin" href="alogin.html">Đăng xuất</a></li>
			</ul>
		</nav>
	</header>
	<div id="divimg" style="margin-top: 50px;padding:0 10px">
		<table>
			<tr>
				<th>ID</th>
				<th>Token</th>
				<th>Tên nhân viên</th>
				<th>Ngày bắt đầu</th>
				<th>Ngày kết thúc</th>
				<th>Tổng số ngày</th>
				<th>Lý do</th>
				<th>Trạng thái</th>
				<th></th>
			</tr>

			<?php
			while ($employee = mysqli_fetch_assoc($result)) {

				$date1 = new DateTime($employee['start']);
				$date2 = new DateTime($employee['end']);
				$interval = $date1->diff($date2);
				$interval = $date1->diff($date2);
				//echo "difference " . $interval->days . " days ";

				echo "<tr>";
				echo "<td>" . $employee['id'] . "</td>";
				echo "<td>" . $employee['token'] . "</td>";
				echo "<td>" . $employee['firstName'] . " " . $employee['lastName'] . "</td>";

				echo "<td>" . $employee['start'] . "</td>";
				echo "<td>" . $employee['end'] . "</td>";
				echo "<td>" . $interval->days . "</td>";
				echo "<td>" . $employee['reason'] . "</td>";
				echo "<td>" . $employee['status'] . "</td>";
				echo "<td><a href=\"approve.php?id=$employee[id]&token=$employee[token]\"  onClick=\"return confirm('Bạn muốn phê duyệt?')\">Phê duyệt</a> | <a href=\"cancel.php?id=$employee[id]&token=$employee[token]\" onClick=\"return confirm('Bạn muốn bỏ qua?')\">Xóa</a></td>";
			}


			?>

		</table>

	</div>
</body>

</html>