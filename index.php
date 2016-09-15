<html>
<head>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<style>
	html, body {
		height: 100%;
		margin: 0;
	}
	body {
		background: #999;
		display: flex;
		align-items: center;
		justify-content: center;
		font: 15px Inconsolata, sans-serif;
	}
	* {
		line-height: 1em;
	}
	header {
		text-align: center;
	}
	#login label {
		background: #333333;
		border: 1px solid #EEEEEE;
		border-bottom-left-radius: 3px;
		border-top-left-radius: 3px;
		color: white;
		display: inline-block;
		margin-bottom: 10px;
		font-size: 12px;
		padding: 4px 8px;
		vertical-align: top;
	}
	#login input {
		background: #EEEEEE;
		border: none;
		border-bottom-right-radius: 3px;
		border-top-right-radius: 3px;
		font: inherit;
		outline: none;
		padding: 5px;
	}
	#login input:focus {
		background: #FFFFFF;
	}
	</style>
</head>
<body>

<div id="login">
	<header>JIMS LOGIN</header>
	<form action="login.php">
    	<label for="username">U</label><input type="text" name="username" autocomplete="off" />
		<label for="password">P</label><input type="password" name="password" autocomplete="off" />
	</form>
</div>

</body>
</html>
