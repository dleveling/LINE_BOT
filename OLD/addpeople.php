<?php

		$name = $_REQUEST['name'];
		$number = $_REQUEST['number'];
		$close = $_REQUEST['close'];
		$home = $_REQUEST['home'];
		
		$user = "id1258199_admin1";
		$pass = "12345678";
		$db = "id1258199_listquiz";
		
		$link = mysqli_connect( "localhost", $user, $pass );
		if ( ! $link ) {
		  die( "Couldn't connect to MySQL: ".mysqli_error() );
		}
		mysqli_select_db($link,$db )
		  or die ( "Couldn't open $db: ".mysqli_error() );
		
		$query = "INSERT INTO PeopleList (name,number,close,home) VALUES ('$name','$number','$close','$home')";
		$result = mysqli_query($link,$query);
		
?>