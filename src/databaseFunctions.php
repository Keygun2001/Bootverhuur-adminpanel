<?php
include('../config/database.php');

function db_connect(){
    $mysqli = new mysqli(db_host, db_user, db_password, db_name);
    return $mysqli;
}

function db_getData($query){
    $mysqli = db_connect();
    $result = $mysqli->query($query);
    $mysqli->close();
    return $result;
}
  
function db_insertData($query) {
    $mysqli = db_connect();
    $result = null;
    if($mysqli->query($query) ===  TRUE) {
        return $mysqli->insert_id;
    } else {
        $result = "Error: ".$query."<br>".$mysqli->error;
    }
    $mysqli->close();
    return $result;
}
 
?>
