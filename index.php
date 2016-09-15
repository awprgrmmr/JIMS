<html>
<head>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<style>
	html, body {
		height: 100%;
		margin: 0;
	}
	body {
		background: #000000 url(background.jpg);
		background-size: cover;
		display: flex;
		font: 14px 'Open Sans', sans-serif;
		justify-content: center;
		align-items: center;
	}
	
	#login label {
		background: black;
		border: 1px solid rgba(255,255,255,0.8);
		border-bottom-left-radius: 3px;
		border-top-left-radius: 3px;
		color: white;
		padding: 4px 8px;
	}
	#login input {
		background: rgba(255,255,255,0.8);
		border: none;
		border-bottom-right-radius: 3px;
		border-top-right-radius: 3px;
		font: 14px 'Open Sans', sans-serif;
		margin-right: 10px;
		outline: none;
		padding: 5px;
	}
	#login input:focus {
		background: rgba(255,255,255,0.9);
	}
	</style>
</head>
<body>

<div id="login">
	<form action="login.php">
    	<label for="username">U</label><input type="text" name="username" autocomplete="off" />
		<label for="password">P</label><input type="password" name="password" autocomplete="off" />
	</form>
</div>

</body>
</html>
