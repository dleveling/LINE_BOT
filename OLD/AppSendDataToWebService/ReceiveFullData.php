<?php
	try{
		$firstName = $_POST["firstName"];
		$userId = $_POST["userId"];
		$fileName = $_FILES["imgFile"]["name"];

		$target_dir = "image/".$fileName;
		if(move_uploaded_file($_FILES["imgFile"]["tmp_name"],$target_dir)){
			echo json_encode([
				"Message"=> "ID : ".$userId." Name: ".$firstName." File : ".$fileName." has been uploaded. ",
				"Status"=>"OK"
			]);			
		}
		else{
			echo json_encode([
				"Message"=>"The file ".$$fileName." can't upload. ",
				"Status"=>"Error"
			]);			
		}
	}
	catch(Exception $ex){
		echo json_encode([
			"Message"=>"Error Code ".$ex->getcode()." --> ".$ex->getMessage(),
			"Status"=>"Error"
		]);		
	}
?>