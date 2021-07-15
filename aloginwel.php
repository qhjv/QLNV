<?php
require_once('process/dbh.php');
$sql = "SELECT id, firstName, lastName,  points FROM employee, rank WHERE rank.eid = employee.id order by rank.points desc";
$result = mysqli_query($conn, $sql);
?>


<html>

<head>
	<title>QLNV</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="styleemplogin.css">
	<!-- Vendor CSS-->
	<link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
	<link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">
</head>

<body>

	<header>
		<nav>
			<h1>QLNV</h1>
			<ul id="navli">
				<li><a class="homeactive" href="aloginwel.php">Trang chủ</a></li>
				<li><a href="addemp.php">Thêm nhân viên</a></li>
				<li><a href="viewemp.php">Xem danh sách</a></li>
				<li><a href="assign.php">Thêm dự án</a></li>
				<li><a href="assignproject.php">Tình trạnh dự án</a></li>
				<li><a href="salaryemp.php">Bảng lương</a></li>
				<li><a href="empleave.php">Xin nghỉ</a></li>
				<li><a class="homeLogin" href="alogin.html">Đăng xuất</a></li>
			</ul>
		</nav>
	</header>

	<div id="divimg" style="display:flex;justify-content: center;">
		<div class="container" style="width:80%;margin-top:50px">
			<div class="row">

				<h2 style="font-family: 'Montserrat', sans-serif; font-size: 25px; text-align: center;">Bảng xếp hạng</h2>
				<table>

					<tr bgcolor="#000">
						<th align="center">STT</th>
						<th align="center">ID</th>
						<th align="center">Tên</th>
						<th align="center">Điểm</th>


					</tr>



					<?php
					$seq = 1;
					while ($employee = mysqli_fetch_assoc($result)) {
						echo "<tr>";
						echo "<td>" . $seq . "</td>";
						echo "<td>" . $employee['id'] . "</td>";

						echo "<td>" . $employee['firstName'] . " " . $employee['lastName'] . "</td>";

						echo "<td>" . $employee['points'] . "</td>";

						$seq += 1;
					}


					?>

				</table>

				<div class="p-t-20">
					<button class="btn btn--radius" type="submit" style="float: right; margin-right: 60px;background:#6C63FF"><a href="reset.php" style="text-decoration: none; color: white"> Reset</button>
				</div>
			</div>
		</div>


	</div>
</body>

</html>