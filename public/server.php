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
        db_insertData("INSERT INTO Verhuur (FirstName, LastName, PhoneNumber, Email, Password, BootID, DagID, DateVerhuur, LuxeID) VALUES ('$vnaam','$anaam', '$telnummer', '$email', '$ww', '$bootid', '$dagdeelid', '$datum', '$luxe')");
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
        db_insertData("UPDATE Verhuur SET FirstName='$vnaam', LastName='$anaam', TelephoneNumber='$telnummer', Email='$email', Password='$ww', BootID='$bootid', DagID='$dagdeelid', DateVerhuur='$datum', LuxeID='$luxe' WHERE id=$id");
        header('location: bestellingen.php');
    }

    if (isset($_GET['delbestelling'])) {
        $id = $_GET['delbestelling'];
        db_insertData("DELETE FROM orders WHERE id=$id");
        header('location: bestellingen.php');
    }
?>