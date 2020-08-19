<?php

	session_start();

	if(isset($_SESSION["visit"])) {

		$_SESSION["visit"] = $_SESSION["visit"] + 1;
	}
	else {
		$_SESSION["visit"] = 1;
	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" href="style.css">
</head>
<body>

	<header>
		<nav>
			<ul>
				<a href="/youtube/php/loginsystemtut/index.php">Home</a>
			</ul>

			<div class="header-login">
				<?php 

					if(isset($_SESSION['userId'])) {
						echo '<p> UserName: '.$_SESSION['userUid'] .'
						<a href="includes/logout.inc.php">Log Out</a>';

					}
					else {
						echo '
							<form action="includes/login.inc.php" method="post">
								<input type="text" name="mailuid" placeholder="UserName/Email...">
								<input type="password" name="pwd" placeholder="Password...">
								<button type="submit" name="login-submit">Login</button>
							</form>
							<br>
							<form action="signup.php" method="get">
								<button type="submit" name="logout-submit">Sign Up</button>
							</form>

							<form action="includes/logout.inc.php" method="method">
								<button type="submit" name="logout-submit">Logout</button>
							</form>

						';
					}

					if(isset($_SESSION['visit'])) {
						echo '<p> Visits: '.$_SESSION['visit'];

					}
				?>

				</div>

		</nav>
	</header>

</body>
</html>