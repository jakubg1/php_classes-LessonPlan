<?php
	$c = mysqli_connect("localhost", "root", "", "planlekcji");
	mysqli_set_charset($c, "utf8mb4");
	
	$hours = array(
		"7:20 - 8:05",
		"8:15 - 9:00",
		"9:10 - 9:55",
		"10:05 - 10:50",
		"11:00 - 11:45",
		"12:05 - 12:50",
		"13:00 - 13:45",
		"13:55 - 14:40",
		"14:50 - 15:35",
		"15:45 - 16:30"
	);
?>

<html lang="pl">
	<head>
		<meta charset="utf-8">
		<title>Plan lekcji</title>
		<link rel="stylesheet" href="style.css">
	</head>
	
	<body>
		<div id="header">
			<h1>Plan lekcji</h1>
		</div>
		
		<div id="content">
			<table>
				<tr>
					<th id="num">#</th>
					<th id="hour">Godzina</th>
					<th id="weekday">Poniedziałek</th>
					<th id="weekday">Wtorek</th>
					<th id="weekday">Środa</th>
					<th id="weekday">Czwartek</th>
					<th id="weekday">Piątek</th>
				</tr>
				<?php
					for ($i = 1; $i < 11; $i++) {
						echo "<tr id=\"lesson\">";
						echo "<td id=\"num\">{$i}</td>";
						echo "<td id=\"hour\">{$hours[$i-1]}</td>";
						for ($j = 1; $j <= 5; $j++) {
							$sql = "SELECT nazwa FROM lekcje WHERE id_dzientygodnia = {$j} AND id_godzina = {$i}";
							$result = mysqli_fetch_assoc(mysqli_query($c, $sql));
							if ($result) {
								echo "<td>{$result["nazwa"]}</td>";
							} else {
								echo "<td></td>";
							}
						}
						echo "</tr>";
					}
				?>
			</table>
		</div>
	</body>
</html>

<?php
	mysqli_close($c);
?>