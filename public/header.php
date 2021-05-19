<?php 
    include('../config/config.php')
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bootverhuur KDC Adminpanel</title>
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
        <link rel="shortcut icon" type="image/png" href="<?php echo IMAGE_FOLDER.'/favicon.png'?>" />
        <link rel="stylesheet" href="<?php echo CSS_FOLDER ?>" />
    </head>
    <body>
        <div class="bg-purple-800 h-16">
            <div class="headercontainer">
                <div class="flex">
                    <h1 class="logo w-6/12 mt-2">
                        <a class="text-white" href="index.php">
                            Bootverhuur KDC Adminpanel
                        </a>
                    </h1>
                    <div class="flex w-full justify-end">
                        <nav>
                            <ul class="flex space-x-4 mt-8">
                                <li>
                                    <a class="link text-white" href="bestellingen.php">
                                        Bestellingen
                                    </a>
                                </li>
                                <li>
                                    <a class="link text-white" href="bestellingen.php">
                                        Gebruikers
                                    </a>
                                </li>
                                <li>
                                    <a class="link text-white" href="bestellingen.php">
                                        Boten
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>