<?php
    include('server.php');
    include('header.php');
    session_start();
    
    $boot = db_getData("SELECT * FROM boot");
    $dagdeel = db_getData("SELECT * FROM Dagdeel");
    $optie= db_getData("SELECT * FROM Optie");

    if($_SESSION['user']) {
        $user = $_SESSION['user'];
    } else {
        header('location: index.php');
    }

    if (isset($_GET['edit'])) {
        $id = $_GET['edit'];
        $update = true;
        $record = db_getData("SELECT * FROM verhuur WHERE id=$id");
        if ($record->num_rows > 0 ) {
            $n = $record->fetch_array();
            $vnaam = $n['FirstName'];
            $anaam = $n['LastName'];
            $telnummer = $n['PhoneNumber'];
            $email = $n['Email'];
            $ww = $n['Password'];
            $bootid = $n['BootID'];
            $dagdeelid = $n['DagID'];
            $datum = $n['DateVerhuur'];
            $luxe = $n['LuxeID'];
        }
    }
?>
<body>
    <div class="container">
        <div class="py-8">
            <h2 class="text-xl-2">
                Bestellingen
            </h2>
            <p class="mt-4">
                Pas hier bestellingen aan of verwijder ze.
            </p>
        </div>
        <div class="w-full flex">
            <div class="wrapper">
                <div class="mt-4">
                    <?php $results = db_getData("SELECT verhuur.*, boot.price, optie.PriceL, boot.BoatName, optie.Luxe FROM verhuur INNER JOIN boot ON verhuur.BootID = boot.id INNER JOIN optie ON verhuur.LuxeID = optie.id") ?>
                    <table class="w-full">
                        <tr>
                            <th>Id</th>
                            <th>Voornaam</th>
                            <th>Achternaam</th>
                            <th>Telefoonnummer</th>
                            <th>Email</th>
                            <th>Wachtwoord</th>
                            <th>Boot</th>
                            <th>Dag deel</th>
                            <th>Datum</th>
                            <th>Luxe</th>
                            <th>Prijs boot</th>
                            <th>Prijs Luxe</th>
                            <th>Edit</th>
                            <th>Verwijderen</th>
                        </tr>
                        <?php while($row = $results->fetch_assoc()) { ?>
                            <tr>
                                <td>
                                    <?php echo $row['id']; ?>
                                </td>
                                <td>
                                    <?php echo $row['FirstName']; ?>
                                </td>
                                <td>
                                    <?php echo $row['LastName']; ?>
                                </td>
                                <td>
                                    <?php echo $row['PhoneNumber']; ?>
                                </td>
                                <td>
                                    <?php echo $row['Email']; ?>
                                </td>
                                <td>
                                    <?php echo $row['Password']; ?>
                                </td>
                                <td>
                                    <?php echo $row['BoatName']; ?>
                                </td>   
                                <td>
                                    <?php echo $row['DagID']; ?>
                                </td>
                                <td>
                                    <?php echo $row['DateVerhuur']; ?>
                                </td>
                                <td>
                                    <?php echo $row['Luxe']; ?>
                                </td>
                                <td>
                                    €<?php echo $row['price']; ?>
                                </td>
                                <td>
                                    €<?php echo $row['PriceL']; ?>
                                </td>
                                <td class="p-2">
                                    <a href="bestellingen.php?edit=<?php echo $row['id']; ?>" class="Editbutton">
                                        Edit
                                    </a>
                                </td>
                                <td class="p-2">
                                    <a href="server.php?delbestelling=<?php echo $row['id']; ?>" class="Verwijderbutton">
                                        Verwijderen
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                    <form action="server.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <div class="w-2/12">
                            <label>Voornaam</label>
                            <input type="text" name="vnaam" value="<?php echo $vnaam; ?>">
                        </div>
                        <div class="w-2/12 mt-4">
                            <label>Achternaam</label>
                            <input type="text" name="anaam" value="<?php echo $anaam; ?>">
                        </div>
                        <div class="w-2/12 mt-4">
                            <label>Telefoonnummer</label>
                            <input type="text" name="telnummer" value="<?php echo $telnummer; ?>">
                        </div>
                        <div class="w-2/12 mt-4">
                            <label>Email</label>
                            <input type="text" name="email" value="<?php echo $email; ?>">
                        </div>
                        <div class="w-2/12 mt-4">
                            <label>Wachtwoord</label>
                            <input type="text" name="wachtwoord" value="<?php echo $ww; ?>">
                        </div>
                        <div class="w-1/12 mt-4">
                            <label>Boot</label>
                            <select class="w-full" name="bootSelect">
                                <?php 
                                    while($boten = $boot->fetch_assoc()){
                                ?>
                                <option value="<?php echo $boten['id'];?>"><?php echo $boten['BoatName'];?></option>

                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="w-1/12 mt-4">
                            <label>Dagdeel</label>
                            <select class="w-full" name="dagdeelSelect">
                                <?php 
                                    while($dagdelen = $dagdeel->fetch_assoc()){
                                ?>
                                <option value="<?php echo $dagdelen['id'];?>"><?php echo $dagdelen['DayPart'];?></option>

                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="w-1/12 mt-4">
                            <label>Datum</label>
                            <input type="datetime-local" name="datum" value="<?php echo $datum; ?>">
                        </div>
                        <div class="w-2/12 mt-4">
                            <label>Luxe</label>
                            <select class="w-full" name="luxeSelect">
                                <?php 
                                    while($luxes = $optie->fetch_assoc()){
                                ?>
                                <option value="<?php echo $luxes['id'];?>"><?php echo $luxes['Luxe'];?></option>

                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="mt-4">
                            <?php if($update == true) { ?>
                                <button class="knop" type="submit" name="updatebestelling">
                                    Update
                                </button>
                            <?php } else { ?>
                                <button class="knop" type="submit" name="savebestelling">
                                    Opslaan
                                </button>
                            <?php } ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<?php
    include("footer.php");
?>