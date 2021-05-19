<?php
    include('header.php');
    include('../src/databaseFunctions.php');
    $boot = db_getData("SELECT * FROM Boot");
    // include('server.php');

    if (isset($_GET['edit'])) {
        $id = $_GET['edit'];
        $update = true;
        $record = db_getData("SELECT * FROM Boot WHERE id=$id");
        if ($record->num_rows > 0 ) {
            $n = $record->fetch_array();
            $Boten = $n['BoatName'];
            $Price = $n['Price'];
          
        }
    }
?>
    <body>
        <div class="container">
            <div class="py-8">
                <h2>
                    Boten
                </h2>
                <p>
                    Pas hier boten aan of verwijder ze
                </p>
            </div>
        <?php $results = db_getData("SELECT * FROM Boot"); ?>
                <table class="mt-4">
                            <tr>
                                <th>ID</th>
                                <th>Boot Naam</th>
                                <th>Prijs</th>
                                <th>Edit</th>
                                <th>Verwijderen</th>
                            </tr>
                            <?php while($row = $results->fetch_assoc()) { ?>
                                <tr>
                                    <td>
                                        <?php echo $row['id']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['BoatName']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['Price']; ?>
                                    </td>
                                    <td class="p-2">
                                        <a href="Boten.php?edit=<?php echo $row['id']; ?>" class="Editbutton">
                                            Edit
                                        </a>
                                    </td>
                                    <td class="p-2">
                                        <a href="server.php?delBoten=<?php echo $row['id']; ?>" class="Verwijderbutton">
                                            Verwijderen
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        
        </table>
        <form action="server.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <div class="w-2/12">
                                <label>Boot Naam</label>
                                <input type="text" name="BoatName" value="<?php echo $Boten; ?>">
                            </div>
                            <div class="w-2/12 mt-4">
                                <label>Prijs</label>
                                <input type="text" name="Price" value="<?php echo $Price; ?>">
                            </div>
                            
                           
                          
                            <div class="mt-4">
                                <?php if($update == true) { ?>
                                    <button class="knop" type="submit" name="updateBoten">
                                        Update
                                    </button>
                                <?php } else { ?>
                                    <button class="knop" type="submit" name="saveBoten">
                                        Opslaan
                                    </button>
                                <?php } ?>
                            </div>
                        </form>
        </div>
    </body>
<?php
    include("footer.php");
?>