<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/bootstrap-theme.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet">
        <title>Fuksipassi 2014</title>
    </head>
    <body>
        <div class="container">
            <ul class="nav nav-pills">
                <li><a href="index.php">Etusivu</a></li>
                <li><a href="my.php">Omat tiedot</a></li>
                <li><a href="events.php">Tapahtumat</a></li>
                <li><a href="fuksit.php">Fuksit</a></li>
                <li><a href="logout.php">Kirjaudu ulos</a></li>
            </ul>
        </div>


        <div class="container">

            <!--virheilmoitukset, siivoan myöhemmin!-->

            <?php if (!empty($data->virheet)): ?>
                <br>
                <?php foreach ($data->virheet as $virhe): ?>
                    <div class="alert alert-danger"><?php echo $virhe; ?></div>
                <?php endforeach; ?>
            <?php endif; ?>
            <?php if (!empty($data->uservirheet)): ?>
                <br>
                <?php foreach ($data->uservirheet as $virhe): ?>
                    <div class="alert alert-danger"><?php echo $virhe; ?></div>
                <?php endforeach; ?>

            <?php endif; ?>
            <?php if (isset($_SESSION['ilmoitus'])): ?>
                <br>
                <div class="alert alert-success"><?php echo $_SESSION['ilmoitus']; ?></div>
                <?php unset($_SESSION['ilmoitus']); ?>
            <?php endif; ?>



            <?php
            /* HTML-rungon keskellä on sivun sisältö, 
             * joka haetaan sopivasta näkymätiedostosta.
             * Oikean näkymän tiedostonimi on tallennettu muuttujaan $sivu.
             */

            require 'views/' . $sivu . '.php';
            ?>

        </div>
    </body>


</html>