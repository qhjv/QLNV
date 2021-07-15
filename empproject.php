<?php
$id = (isset($_GET['id']) ? $_GET['id'] : '');
require_once('process/dbh.php');
$sql = "SELECT * FROM `project` where eid = '$id'";
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
			<h1>Nhân viên QH</h1>
			<ul id="navli">
				<li><a href="eloginwel.php?id=<?php echo $id ?>"">Trang chủ</a></li>
				<li><a  href=" myprofile.php?id=<?php echo $id ?>"">Hồ sơ cá nhân</a></li>
				<li><a class=" homeactive" href=" empproject.php?id=<?php echo $id ?>"">Dự án</a></li>
				<li><a href=" applyleave.php?id=<?php echo $id ?>"">Xin nghỉ</a></li>
				<li><a class=" homeLogin" href="elogin.html">Đăng xuất</a></li>
			</ul>
		</nav>
	</header>

	<div id="divimg" style="margin-top:50px;padding:0 10px">


		<table>
			<tr>

				<th align="center">ID</th>
				<th align="center">Tên dự án</th>
				<th align="center">Ngày bắt đầu</th>
				<th align="center">Ngày kết thúc</th>
				<th align="center">Điểm</th>
				<th align="center">Trạng thái</th>
				<th align="center"></th>
			</tr>

			<?php
			while ($employee = mysqli_fetch_assoc($result)) {

				echo "<tr>";
				echo "<td>" . $employee['pid'] . "</td>";
				echo "<td>" . $employee['pname'] . "</td>";
				echo "<td>" . $employee['duedate'] . "</td>";
				echo "<td>" . $employee['subdate'] . "</td>";
				echo "<td>" . $employee['mark'] . "</td>";
				echo "<td>" . $employee['status'] . "</td>";


				echo "<td><a href=\"psubmit.php?pid=$employee[pid]&id=$employee[eid]\">Hoàn thành</a>";
			}


			?>

		</table>

</body>

</html>