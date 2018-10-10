<?php
	if(!isset($_REQUEST['StuID']))
	{
		$myJSON = json_encode($tmp);
		echo $myJSON;
	}
	else {
		$sidd = $_REQUEST['StuID'];
		$snamee = $_REQUEST['StuName'];
		$user = "id1258199_admin";
		$pass = "12345678";
		$db = "id1258199_sup";
		
		$link = mysqli_connect( "localhost", $user, $pass );
		if ( ! $link ) {
		  die( "Couldn't connect to MySQL: ".mysqli_error() );
		}
		mysqli_select_db($link,$db )
		  or die ( "Couldn't open $db: ".mysqli_error() );
		
		$query = "INSERT INTO  student(StuID,StuName) values('$sidd','$snamee')";
		
		$result = mysqli_query($link,$query);
		}
?>