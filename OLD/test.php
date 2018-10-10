<?php
header("Content-Type: application/json; charset=UTF-8");
$tmp=array();
for($i=1;$i<=30;$i++)
{
 $data = array(
 "title" => "The Definitive Guide : " . $i,
 "author" => "David Flanagan : " . $i,
 "edition" => $i );
 array_push($tmp,$data);
}
$myJSON = json_encode($tmp);
echo $myJSON;
?>