<?php
    header("Content-Type: application/json; charset=UTF-8");
    $user = "id1258199_admin1";
	$pass = "12345678";
	$db = "id1258199_listquiz";
		
		$link = mysqli_connect( "localhost", $user, $pass );
		if ( ! $link ) {
		  die( "Couldn't connect to MySQL: ".mysqli_error() );
		}
		mysqli_select_db($link,$db )
		  or die ( "Couldn't open $db: ".mysqli_error() );
		 
		$query = "Select * From PeopleList";
		$result = mysqli_query($link,$query);
		
		$tmp=array();
		if(mysqli_num_rows($result)>0) 
		{
			foreach($result as $row)
			{
				   $book = array(	"name" => $row['name'],
    								"number" => $row['number'],
    								"close" => $row['close'],
    								"home" => $row['home'] );
   					array_push($tmp,$book);
			}
			$myJSON = json_encode($tmp);
			echo $myJSON;
		}
?>