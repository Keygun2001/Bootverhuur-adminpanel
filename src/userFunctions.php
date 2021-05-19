<?php
    include_once('databaseFunctions.php');

    function registerUser($firstName,$lastName,$phonenumber,$email,$password, $bootID, $dagdeelID, $date, $luxeID){
        $result = db_insertData("INSERT INTO verhuur(FirstName, LastName, PhoneNumber, Email, Password, BootID, dagID, DateVerhuur ,LuxeID) VALUES ('$firstName','$lastName','$phonenumber','$email','$password', '$bootID', '$dagdeelID' ,'$date', '$luxeID')");
        return $result;
    }

    function getUser($email,$password){
        $user = db_getData("SELECT * FROM Verhuur WHERE email = '$email' AND password = '$password'");
        if ($user->num_rows > 0){
            while($row = $user->fetch_assoc()) {
                $_SESSION['user'] = $row;
                header("location: bestellingen.php");
                exit;
              }
            session_start();
            return $user;
        }else{
            return "No user found";
        }
    }
?>
