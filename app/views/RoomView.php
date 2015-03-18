<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="/css/style.css">
		<title>Room</title>
	</head>
	<body>
		<header>
			<h1>This is the Room View</h1>
		</header>
		<div id="messages">
			<p> <strong>User 1 :</strong><span class="message">Ceci est le premier message</span></p>
			<p> <strong>User 2 :</strong><span class="message">Ceci est le second message</span></p>
			<p class="myMessage"><strong>You :</strong><span class="message">Ceci est votre message</span></p>
		</div>
		<div id="users">
			<p>User 1</p>
			<p>User 2</p>
			<p>User 3</p>
		</div>
		<textarea id="writeMessage" name="message" form="sendMessage"></textarea>
		<form id="sendButton" action="RoomController.php">
			<button type="submit">Send</button>
		</form>
		<footer></footer>
	</body>
</html>