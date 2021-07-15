<?php
$id = (isset($_GET['id']) ? $_GET['id'] : '');
require_once('process/dbh.php');
$sql = "SELECT * FROM `employee` where id = '$id'";
$result = mysqli_query($conn, $sql);
$employee = mysqli_fetch_array($result);
$empName = ($employee['firstName']);
//echo "$id";
?>

<html>

<head>
	<title>QLNV</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="styleapply.css">
</head>

<body bgcolor="#F0FFFF">

	<header>
		<nav>
			<h1>Nhân viên QH</h1>
			<ul id="navli">
				<li><a href="eloginwel.php?id=<?php echo $id ?>"">Trang chủ</a></li>
				<li><a  href=" myprofile.php?id=<?php echo $id ?>"">Hồ sơ cá nhân</a></li>
				<li><a href="empproject.php?id=<?php echo $id ?>"">Dự án</a></li>
				<li><a  class=" homeactive" href=" applyleave.php?id=<?php echo $id ?>">Xin nghỉ</a></li>
				<li><a class=" homeLogin" href="elogin.html">Đăng xuất</a></li>
			</ul>
		</nav>
	</header>

	<div class="divider"></div>
	<div class="page-wrapper bg-bluep-b-100 font-robo" style="padding:50px 0">
		<div class="wrapper wrapper--w680">
			<div class="card card-1">
				<div class="card-heading"></div>
				<div class="card-body">
					<h2 class="title">Đăng ký lịch nghỉ</h2>
					<form action="process/applyleaveprocess.php?id=<?php echo $id ?>" method="POST">


						<div class="input-group">
							<input class="input--style-1" type="text" placeholder="Lý do" name="reason">
						</div>
						<div class="row row-space">
							<div class="col-2">
								<p>Ngày bắt đầu</p>
								<div class="input-group">
									<input class="input--style-1" type="date" placeholder="start" name="start">

								</div>
							</div>
							<div class="col-2">
								<p>Ngày kết thúc</p>
								<div class="input-group">
									<input class="input--style-1" type="date" placeholder="end" name="end">

								</div>
							</div>
						</div>




						<div class="p-t-20">
							<button class="btn btn--radius btn--green" type="submit">Đăng ký</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
















	<div class="container" style="padding: 0 10px;">

		<table>
			<tr>
				<th align="center">ID</th>
				<th align="center">Tên nhân viên</th>
				<th align="center">Ngày bắt đầu</th>
				<th align="center">Ngày kết thúc</th>
				<th align="center">Tổng số ngày</th>
				<th align="center">Lý do</th>
				<th align="center">Trạng thái</th>
			</tr>


			<?php


			$sql = "Select employee.id, employee.firstName, employee.lastName, employee_leave.start, employee_leave.end, employee_leave.reason, employee_leave.status From employee, employee_leave Where employee.id = $id and employee_leave.id = $id order by employee_leave.token";
			$result = mysqli_query($conn, $sql);
			while ($employee = mysqli_fetch_assoc($result)) {
				$date1 = new DateTime($employee['start']);
				$date2 = new DateTime($employee['end']);
				$interval = $date1->diff($date2);
				$interval = $date1->diff($date2);

				echo "<tr>";
				echo "<td>" . $employee['id'] . "</td>";
				echo "<td>" . $employee['firstName'] . " " . $employee['lastName'] . "</td>";

				echo "<td>" . $employee['start'] . "</td>";
				echo "<td>" . $employee['end'] . "</td>";
				echo "<td>" . $interval->days . "</td>";
				echo "<td>" . $employee['reason'] . "</td>";
				echo "<td>" . $employee['status'] . "</td>";
			}


			?>


		</table>
	</div>







</body>

</html>