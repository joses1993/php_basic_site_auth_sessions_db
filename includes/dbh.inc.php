<?php

$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "loginsystemtut";

$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);

if(!$conn) {

	die("Connection Failed: ".mysqli_connect_error());
}

else {

	echo "Host information: " . mysqli_get_server_info($conn) . PHP_EOL;
}



// Create connection
// Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }

// $sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers)
// VALUES ('John2', '2john@example.com', '1234')";

// if ($conn->query($sql) === TRUE) {
//   echo "New record created successfully";
// } else {
//   echo "Error: " . $sql . "<br>" . $conn->error;
// }

// $conn->close();



// $mysqli = new mysqli($servername, $dbUsername, $dbPassword, $dbName);

// // Oh no! A connect_errno exists so the connection attempt failed!
// if ($mysqli->connect_errno) {
//     // The connection failed. What do you want to do? 
//     // You could contact yourself (email?), log the error, show a nice page, etc.
//     // You do not want to reveal sensitive information

//     // Let's try this:
//     echo "Sorry, this website is experiencing problems.";

//     // Something you should not do on a public site, but this example will show you
//     // anyways, is print out MySQL error related information -- you might log this
//     echo "Error: Failed to make a MySQL connection, here is why: \n";
//     echo "Errno: " . $mysqli->connect_errno . "\n";
//     echo "Error: " . $mysqli->connect_error . "\n";
    
//     // You might want to show them something nice, but we will simply exit
//     exit;
// }

// // Perform an SQL query
// $sql = "SELECT * FROM users";
// if (!$result = $mysqli->query($sql)) {
//     // Oh no! The query failed. 
//     echo "Sorry, the website is experiencing problems.";

//     // Again, do not do this on a public site, but we'll show you how
//     // to get the error information
//     echo "Error: Our query failed to execute and here is why: \n";
//     echo "Query: " . $sql . "\n";
//     echo "Errno: " . $mysqli->errno . "\n";
//     echo "Error: " . $mysqli->error . "\n";
//     exit;
// }

// // Phew, we made it. We know our MySQL connection and query 
// // succeeded, but do we have a result?
// if ($result->num_rows === 0) {
//     // Oh, no rows! Sometimes that's expected and okay, sometimes
//     // it is not. You decide. In this case, maybe actor_id was too
//     // large? 
//     echo "We could not find a match for ID $aid, sorry about that. Please try again.";
//     exit;
// }

// // Now, we know only one result will exist in this example so let's 
// // fetch it into an associated array where the array's keys are the 
// // table's column names
// $actor = $result->fetch_assoc();
// echo "Sometimes I see " . $actor['idUsers'] . " " . $actor['uidUsers'] . " on TV.";

// // Now, let's fetch five random actors and output their names to a list.
// // We'll add less error handling here as you can do that on your own now
// $sql = "SELECT * FROM USERS";
// if (!$result = $mysqli->query($sql)) {
//     echo "Sorry, the website is experiencing problems.";
//     exit;
// }

// // Print our 5 random actors in a list, and link to each actor
// echo "<ul>\n";
// while ($actor = $result->fetch_assoc()) {
//     echo "<li><a href='" . $_SERVER['SCRIPT_FILENAME'] . "?aid=" . $actor['idUsers'] . "'>\n";
//     echo $actor['uidUsers'] . ' ' . $actor['emailUsers'];
//     echo "</a></li>\n";
// }
// echo "</ul>\n";

// // The script will automatically free the result and close the MySQL
// // connection when it exits, but let's just do it anyways
// $result->free();
// $mysqli->close();
// ?>