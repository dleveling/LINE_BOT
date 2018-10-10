<php
	$user = "id1258199_admin";
	$pass = "12345678";
	$db = "id1258199_sup";

	$conn = mysqli_connect($db, $user, $pass);

	if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
	}
	echo "Connected successfully";

?>