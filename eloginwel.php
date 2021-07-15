<?php
$id = (isset($_GET['id']) ? $_GET['id'] : '');
require_once('process/dbh.php');
$sql1 = "SELECT * FROM `employee` where id = '$id'";
$result1 = mysqli_query($conn, $sql1);
$employeen = mysqli_fetch_array($result1);
$empName = ($employeen['firstName']);

$sql = "SELECT id, firstName, lastName,  points FROM employee, rank WHERE rank.eid = employee.id order by rank.points desc";
$sql1 = "SELECT `pname`, `duedate` FROM `project` WHERE eid = $id and status = 'Due'";

$sql2 = "Select * From employee, employee_leave Where employee.id = $id and employee_leave.id = $id order by employee_leave.token";

$sql3 = "SELECT * FROM `salary` WHERE id = $id";

//echo "$sql";
$result = mysqli_query($conn, $sql);
$result1 = mysqli_query($conn, $sql1);
$result2 = mysqli_query($conn, $sql2);
$result3 = mysqli_query($conn, $sql3);
?>



<html>

<head>
	<title>QLNV</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="styleemplogin.css">
	<link href="https://fonts.googleapis.com/css?family=Lobster|Montserrat" rel="stylesheet">
</head>

<body>

	<header>
		<nav>
			<h1>Nhân viên QH</h1>
			<ul id="navli">
				<li><a class="homeactive" href="eloginwel.php?id=<?php echo $id ?>"">Trang chủ</a></li>
				<li><a  href=" myprofile.php?id=<?php echo $id ?>"">Hồ sơ cá nhân</a></li>
				<li><a href="empproject.php?id=<?php echo $id ?>"">Dự án</a></li>
				<li><a  href=" applyleave.php?id=<?php echo $id ?>"">Xin nghỉ</a></li>
				<li><a class="homeLogin" href="elogin.html">Đăng xuất</a></li>
			</ul>
		</nav>
	</header>

	<div id="divimg" style="padding:0 200px">
		<div>
			<!-- <h2>Welcome <?php echo "$empName"; ?> </h2> -->

			<h2 style="font-family: 'Montserrat', sans-serif; font-size: 25px; text-align: center;">Bảng xếp hạng</h2>
			<table>

				<tr bgcolor="#000">
					<th align="center">STT</th>
					<th align="center">ID</th>
					<th align="center">Tên nhân viên</th>
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

			<h2 style="font-family: 'Montserrat', sans-serif; font-size: 25px; text-align: center;">Dự án</h2>


			<table>

				<tr>
					<th align="center">Tên dự án</th>
					<th align="center">Ngày kết thúc</th>

				</tr>



				<?php
				while ($employee1 = mysqli_fetch_assoc($result1)) {
					echo "<tr>";

					echo "<td>" . $employee1['pname'] . "</td>";

					echo "<td>" . $employee1['duedate'] . "</td>";
				}


				?>

			</table>



			<h2 style="font-family: 'Montserrat', sans-serif; font-size: 25px; text-align: center;">Bảng lương</h2>


			<table>

				<tr>

					<th align="center">Lương cứng</th>
					<th align="center">Bonus</th>
					<th align="center">Tổng lương</th>

				</tr>



				<?php
				while ($employee = mysqli_fetch_assoc($result3)) {


					echo "<tr>";


					echo "<td>" . $employee['base'] . "</td>";
					echo "<td>" . $employee['bonus'] . " %</td>";
					echo "<td>" . $employee['total'] . "</td>";
				}





				?>

			</table>










			<h2 style="font-family: 'Montserrat', sans-serif; font-size: 25px; text-align: center;">Xin nghỉ</h2>


			<table>

				<tr>

					<th align="center">Ngày bắt đầu</th>
					<th align="center">Ngày kết thúc</th>
					<th align="center">Tổng số ngày</th>
					<th align="center">Lý do</th>
					<th align="center">Trạng thái</th>
				</tr>



				<?php
				while ($employee = mysqli_fetch_assoc($result2)) {
					$date1 = new DateTime($employee['start']);
					$date2 = new DateTime($employee['end']);
					$interval = $date1->diff($date2);
					$interval = $date1->diff($date2);

					echo "<tr>";


					echo "<td>" . $employee['start'] . "</td>";
					echo "<td>" . $employee['end'] . "</td>";
					echo "<td>" . $interval->days . "</td>";
					echo "<td>" . $employee['reason'] . "</td>";
					echo "<td>" . $employee['status'] . "</td>";
				}





				?>

			</table>





			<br>
			<br>
			<br>
			<br>
			<br>







		</div>


		</h2>




	</div>
</body>

</html>