<?php
	require "header.php";
?>

	<main>
		<?<?php 


			if(isset($_SESSION['userId'])) {

				if(isset($_SESSION['signup'])) {
					if($_SESSION['signup'] == "success")
					{
						echo '<p>Welcome to your new account!</p>';
					}
				}

				echo '<p>You are logged in: '.$_SESSION['userUid'].'!</p>';

			}
			else {
				echo '<p> You are not logged in</p>';
			}
		 ?>
	</main>

<?php
	require "footer.php";
?>