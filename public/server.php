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
    $emaila = '';
    $wwa = '';
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

    if(isset($_POST['saveadmin'])) {
        $emaila = $_POST['email'];
        $wwa = $_POST['ww'];
        db_insertData("INSERT INTO Admin (Email, Password) VALUES ('$emaila','$wwa')");
        header('location: admins.php');
    }

    if (isset($_POST['updateadmin'])) {
        $emaila = $_POST['email'];
        $wwa = $_POST['ww'];
        $id = $_POST['id'];
        db_insertData("UPDATE Admin SET Email='$emaila', Password='$wwa' WHERE id=$id");
        header('location: admins.php');
    }

    if (isset($_GET['deladmin'])) {
        $id = $_GET['deladmin'];
        db_insertData("DELETE FROM Admin WHERE id=$id");
        header('location: admins.php');
    }
?>