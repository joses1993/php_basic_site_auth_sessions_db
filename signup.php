<?php
	require "header.php";
?>

	<main>
		<div class="wrapper-main">
			<section class="section-default">
				<h1>Sign Up:  </h1> 

				<?php
					if(isset($_GET['error'])) {

						if($_GET['error'] == 'emptyfields')
						{
							echo '<p>Please fill all fields</p>';
						}
						else if($_GET['error'] == 'invalidmail')
						{
							echo '<p>Please enter a valid email</p>';
						}
						else if($_GET['error'] == 'invalidui')
						{
							echo '<p>Please enter a valid username</p>';
						}
						else if($_GET['error'] == 'passwordcheck'){
							echo '<p>Passwords do not match</p>'; 
						}
					}
					else if(isset($_GET['signup'])) {
						if($_GET['signup'] == 'success')
						{
							header("/index.php"); 
						}
					}

				?>

					<form class="form-signup" action="includes/signup.inc.php" method="post">
					<input type="text" name="uid" placeholder="Username">
					<input type="text" name="email" placeholder="Email">
					<input type="password" name="pwd" placeholder="Password">
					<input type="password" name="pwd-repeat" placeholder="Confirm Password">
					<button type="submit" name="signup-submit">Signup</button>
				</form>
			</section>
		</div>
	</main>

<?php
	require "footer.php";
?>