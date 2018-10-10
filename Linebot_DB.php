<?php
    
    ini_set('display_errors',1);

    function connectDB(){
        $host = "localhost";
        $user = "id1258199_linedb";
        $pass = "2809900040740";
        $db = "id1258199_linedb";
        $link = mysqli_connect( $host, $user, $pass, $db);
        if ( ! $link ) {
            die( "Couldn't connect to MySQL: ".mysql_error() );
        }
        return $link;
    }


    function insertUser($userID,$name){
        $link=connectDB();
        $query = "Insert Into TBUser(userID,name) values('$userID','$name')";
        mysqli_query($link,$query) or die ( "INSERT error: ".mysql_error() );
    }


    function getUser(){
        $link=connectDB();
        $query = "Select * from TBUser";
        $result = mysqli_query($link,$query);
        $userID = array();
        
        foreach ($result as $val){
             $userID[]=$val['userID'];
         }
        return $userID;
    }

    function updateUser($userID,$name){
        $link=connectDB();
        $query = "UPDATE TBUser SET name='$name' WHERE userID='$userID'";
        mysqli_query($link,$query) or die ( "INSERT error: ".mysql_error() );
    }


?>