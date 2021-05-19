<?php
    include('server.php');
    include('header.php');
    session_start();

    if($_SESSION['user']) {
        $user = $_SESSION['user'];
    } else {
        header('location: index.php');
    }

    if (isset($_GET['edit'])) {
        $id = $_GET['edit'];
        $update = true;
        $record = db_getData("SELECT * FROM Admin WHERE id=$id");
        if ($record->num_rows > 0 ) {
            $n = $record->fetch_array();
            $email = $n['Email'];
            $ww = $n['Password'];
        }
    }
?>
<body>
    <div class="container">
        <div class="py-8">
            <h2 class="text-xl-2">
                Admins
            </h2>
            <p class="mt-4">
                Pas hier admins aan of verwijder ze.
            </p>
        </div>
        <div class="w-full flex">
            <div class="wrapper">
                <div class="mt-4">
                    <?php $results = db_getData("SELECT Admin.* FROM Admin") ?>
                    <table class="w-full">
                        <tr>
                            <th>Id</th>
                            <th>Email</th>
                            <th>Wachtwoord</th>
                            <th>Edit</th>
                            <th>Verwijderen</th>
                        </tr>
                        <?php print_r($results); while($row = $results->fetch_assoc()) { ?>
                            <tr>
                                <td>
                                    <?php echo $row['id']; ?>
                                </td>
                                <td>
                                    <?php echo $row['Email']; ?>
                                </td>
                                <td>
                                    <?php echo $row['Password']; ?>
                                </td>
                                <td class="p-2">
                                    <a href="admins.php?edit=<?php echo $row['id']; ?>" class="Editbutton">
                                        Edit
                                    </a>
                                </td>
                                <td class="p-2">
                                    <a href="admins.php?deladmin=<?php echo $row['id']; ?>" class="Verwijderbutton">
                                        Verwijderen
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                    <form action="server.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <div class="w-2/12">
                            <label>Email</label>
                            <input type="email" name="email" value="<?php echo $email; ?>">
                        </div>
                        <div class="w-2/12 mt-4">
                            <label>Wachtwoord</label>
                            <input type="text" name="ww" value="<?php echo $ww; ?>">
                        </div>
                        
                        <div class="mt-4">
                            <?php if($update == true) { ?>
                                <button class="knop" type="submit" name="updateadmin">
                                    Update
                                </button>
                            <?php } else { ?>
                                <button class="knop" type="submit" name="saveadmin">
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