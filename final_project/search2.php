<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>
		
	</title>
</head>
<body>
	<div class="title" style="text-align: center;"><h1>查詢結果</h1></div>
	<table class="table table-dark"  >
		<thead>
			<tr>
				<th scope="col">學號</th>
				<th scope="col">姓名:</th>
				<th scope="col">系級</th>
				<th scope="col">可工讀時間</th>
				<th scope="col">申請資格</th>
				<th scope="col">申請單位</th>
				<th scope="col">詳情</th>

			</tr>
		</thead>
		<?php
		
		$sql="with tmp as(SELECT DISTINCT sid,
		STUFF((
		SELECT ',' + a.able_time
		FROM able_time a
		WHERE a.sid=b.sid
		FOR XML PATH('')
		), 1, 1, '') AS able_time
		FROM able_time b),
		tmp2 as(SELECT DISTINCT sid,
		STUFF((
		SELECT ',' + a.work_department
		FROM work_department a
		WHERE a.sid=b.sid
		FOR XML PATH('')
		), 1, 1, '') AS work_department
		FROM work_department b
		)
		select *
		from student_data,tmp,tmp2 where student_data.sid=tmp.sid and student_data.sid=tmp2.sid and student_data.sid='$sid'";
		$qury=sqlsrv_query($conn,$sql) or die("sql error".sqlsrv_errors());

		?>
		<tbody>
			<tr>
				<?php while ($row=sqlsrv_fetch_array($qury)) { ?> <!--return a row as an array -->
				<tr>

					<td><?php echo $row['sid'];?></td>
					<td><?php echo $row['name'];?> </td>
					<td><?php echo $row['class'];?> </td>
					<td><?php echo $row['able_time'];?></td>
					<td><?php echo $row['quality'];?></td>
					<td><?php echo $row['work_department'];?></td>
					<td>
						<a href="edit.php?sid=<?php echo $row["sid"];?>" class="btn btn-info">詳情</a>
					</td>

				</tr>
			<?php } ?>
		</tr>
	</tbody>
</table>
</body>
</html>