<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="/css/style.css">
		<title>Accueil</title>
	</head>
	<body>
		<header>
			<h1>This is the Main View</h1>
		</header>
		<div id="rooms">
			<a href="#"><p><strong>Room 1</strong> - 15 participants</p></a>
			<hr>
			<a href="#"><p><strong>Room 2</strong> - 15 participants</p></a>
			<hr>
			<a href="#"><p><strong>Room 3</strong> - 15 participants</p></a>

		</div>
		<div id="right">
			<hr>
			<table id="tablo">
				<tr>
					<td>
						<br>
						Username :<br>
						<input type="text"  name="username">
					</td>
					<td>
						<br>
						New room <br>
						<form method="GET" action="RoomView.php">
							<input type="text" name="roomname">
							<br>
							<input type="submit" value="Create">
							<br> <br>
						</form>
					</td>
				</tr>
			</table>
		</div>
	</body>
</html>