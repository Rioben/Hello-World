<?php
	$con = mysqli_connect("localhost", "id3634791_riobenindog", "rioben0912I", "id3634791_rio");

	$username = $POST["username"];
	$password = $POST["password"];

	$statement = mysqli_prepare($con, "SELECT * FROM user WHERE username = ? AND password = ?");
	mysqli_stmt_bind_param($statement, "ss", $username, $password);
	msqli_stmt_execute($statement);


	mysqli_stmt_store_result($statement);
	mysqli_stmt_bind_result($statement, $userID, $name, $age, $username, $password);

	$response = array();
	$response["success"] = false;

	while (mysqli_stmt_fetch($statement)) {
		$response["success"] = true;
		$response["name"] = $name;
		$response["age"] = $age;
		$response["username"] = $username;
		$response["password"] = $password;
	}

	echo json_encode($response);
?>
