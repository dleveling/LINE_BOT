<?php
	try{
		$firstName = $_POST["firstName"];
		$userId = $_POST["userId"];
		echo json_encode([
			"Message" => "User id is ".$userId." and First name is ".$firstName." has been uploaded.",
			"Status" => "OK"
		]);
	}
	catch(Exception $ex){
		echo json_encode([
            "Message" => "Error Code : ".$ex->getcode()."-->".$ex->getMessage(),
            "Status"=> "Error"
		]);		
	}
?>
	