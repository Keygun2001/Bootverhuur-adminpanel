<?php
    include('../src/databaseFunctions.php');
    $vnaam = '';
    $anaam = '';
    $telnummer = '';
    $email = '';
    $ww = '';
    $bootid = '';
    $dagdeelid = '';
    $datum = '';
    $luxe = '';
    $id = 0;
    $update = false;
    $Boten ='';
    $Price = '';


    if(isset($_POST['savebestelling'])) {
        $vnaam = $_POST['vnaam'];
        $anaam = $_POST['anaam'];
        $telnummer = $_POST['telnummer'];
        $email = $_POST['email'];
        $ww = $_POST['wachtwoord'];
        $bootid = $_POST['bootSelect'];
        $dagdeelid = $_POST['dagdeelSelect'];
        $datum = $_POST['datum'];
        $luxe = $_POST['luxeSelect'];
        db_insertData("INSERT INTO verhuur (FirstName, LastName, PhoneNumber, Email, Password, BootID, DagID, DateVerhuur, LuxeID) VALUES ('$vnaam','$anaam', '$telnummer', '$email', '$ww', '$bootid', '$dagdeelid', '$datum', '$luxe')");
        header('location: bestellingen.php');
    }

    if (isset($_POST['updatebestelling'])) {
        $vnaam = $_POST['vnaam'];
        $anaam = $_POST['anaam'];
        $telnummer = $_POST['telnummer'];
        $email = $_POST['email'];
        $ww = $_POST['wachtwoord'];
        $bootid = $_POST['bootSelect'];
        $dagdeelid = $_POST['dagdeelSelect'];
        $datum = $_POST['datum'];
        $luxe = $_POST['luxeSelect'];
        $id = $_POST['id'];
        db_insertData("UPDATE verhuur SET FirstName='$vnaam', LastName='$anaam', PhoneNumber='$telnummer', Email='$email', Password='$ww', BootID='$bootid', DagID='$dagdeelid', DateVerhuur='$datum', LuxeID='$luxe' WHERE id=$id");
        header('location: bestellingen.php');
    }

    if (isset($_GET['delbestelling'])) {
        $id = $_GET['delbestelling'];
        db_insertData("DELETE FROM verhuur WHERE id=$id");
        header('location: bestellingen.php');
    }
    if (isset($_POST['updateBoten'])) {
        $Boten=$_POST['BoatName'];
        $Price=$_POST['Price'];
        $id = $_POST['id'];
        db_insertData("UPDATE Boot SET BoatName='$Boten', Price='$Price' WHERE id=$id");
        header('location: Boten.php');
    }
    if(isset($_POST['saveBoten'])) {
        $Boten=$_POST['BoatName'];
        $Price=$_POST['Price'];
        db_insertData("INSERT INTO Boot (BoatName, Price) VALUES ('$Boten','$Price')");
        header('location: Boten.php');
    }
    if (isset($_GET['delBoten'])) {
        $id = $_GET['delBoten'];
        db_insertData("DELETE FROM Boot WHERE id=$id");
        header('location: Boten.php');
    }
?>