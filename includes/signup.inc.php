<?php

if(isset($_POST['signup-submit'])) {

	require 'dbh.inc.php';

	$username = $_POST['uid'];
	$email = $_POST['email'];
	$password = $_POST['pwd'];
	$passwordRepeat = $_POST['pwd-repeat'];


	if(empty($username) || empty($email) || empty($password) || empty($passwordRepeat)){
		header("Location: ../signup.php?error=emptyfields&uid=".$username."&email=".$email);
		exit();
	}

	else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
		header("Location: ../signup.php?error=invalidmailuid");
		exit();
	}

	else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		header("Location: ../signup.php?error=invalidmail&uid=".$username);
		exit();
	}

	else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
		header("Location: ../signup.php?error=invalidui&uid=".$email);
		exit();
	}

	else if ($password !== $passwordRepeat) {
		header("Location: ../signup.php?error=passwordcheck&uid=".$username."&email=".$email);
		exit();
	}



	else{

		$sql = "SELECT uidUsers FROM users WHERE uidUsers=?"; //? prevents var from containing sql code
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt,$sql)){
			header("Location ../signup.php?error=sqlerror");
			exit();

		}

		else{

			mysqli_stmt_bind_param($stmt, "s", $username); //"s" = string "i" = int "b" = blob
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt); //stores results in stmt
			$resultCheck = mysqli_stmt_num_rows($stmt); //checks number of rows in stmt

			if($resultCheck > 0) {
				header("Location: ../signup.php?error=usertaken&uid=".$email);
				exit();
			}
			else {

				//you bind values into stmt to prevent sqlinjection.
				$sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers) VALUES (?, ?, ?)";
				$stmt = mysqli_stmt_init($conn);

				if (!mysqli_stmt_prepare($stmt,$sql)){
					header("Location ../signup.php?error=sqlerror");
					exit();

				}
				else {

					$hashedPwd = password_hash($password, PASSWORD_DEFAULT);
					mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd); //"s" = string "i" = int "b" = blob
					mysqli_stmt_execute($stmt);

					session_start();
					$_SESSION['userId'] = $username;
					$_SESSION['userUid'] = $username;
					header("Location: ../index.php?signup=success");
					exit();

				}

			}

		}

	}

	mysqli_stmt_close($stmt);
	mysqli_close($conn);
}

else {
	header("Location: ../signup.php?error=invalidaccess");
	exit();
} 


