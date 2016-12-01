<?php session_start(); ?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Math Game</title>
</head>
<body>
<h1>Enter Credentials to Begin</h1>`
	<?php
		if (isset($_GET["msg"])) {
		echo $_GET["msg"];    
		} 
	?>
	
    <form role="form" action="validate.php" method="post">
		<label for="email">Email: </label>
		<input type="text" required="true" id="email" name="email" placeholder="Enter Email" size="8" />
		<label for="pwd">Password:</label>
		<input type="text" required="true" id="password" name="password" placeholder="Enter Password" size="8" />
		<button type="submit">Sign In</button>
    </form>

</body>
</html>