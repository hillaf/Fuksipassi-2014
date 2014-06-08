<html>
    <head>
        <meta charset="UTF-8">
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/bootstrap-theme.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet">
        <title>Fuksipassi 2014</title>
    </head>
    <body>
        <div class="container">
            <ul class="nav nav-pills">
                <li class="active"><a href="index.php">Etusivu</a></li>
                <li><a href="my.php">Omat tiedot</a></li>
                <li><a href="events.php">Tapahtumat</a></li>
                <li><a href="fuksit.php">Fuksit</a></li>
                <li><a href="logout.php">Kirjaudu ulos</a></li>
            </ul>
        </div>
        <?php
        /* HTML-rungon keskellä on sivun sisältö, 
         * joka haetaan sopivasta näkymätiedostosta.
         * Oikean näkymän tiedostonimi on tallennettu muuttujaan $sivu.
         */
        
        require 'views/' . $sivu . '.php';
        ?>
    
</html>