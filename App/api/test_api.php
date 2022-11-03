<?php

include "api.php";

$api_object = new API();
if($_GET["action"]=="fetch_all"){
    $data = $api_object->fetch_all();
}
//insert action 
 if($_GET["action"] == "insert")
 {
    $data = $api_object->insert();
 }
echo json_encode($data);