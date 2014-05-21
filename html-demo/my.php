<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="../css/bootstrap.css" rel="stylesheet">
        <link href="../css/bootstrap-theme.css" rel="stylesheet">
        <link href="../css/main.css" rel="stylesheet">
        <title>Fuksipassi 2014</title>
    </head>
    <body>
        <div class="container">
            <ul class="nav nav-pills">
                <li class="active"><a href="index.php">Etusivu</a></li>
                <li><a href="my.php">Omat tiedot</a></li>
                <li><a href="events.php">Tapahtumat</a></li>
                <li><a href="fuksit.php">Fuksit</a></li>
                <li><a href="#">Kirjaudu ulos</a></li>
            </ul>
        </div>
        <div class="container">

        <h1><?php echo "Omat tiedot" ?></h1>
        
            <form role="form">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nimi</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Nimi">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Email</label>
                    <input type="email" class="form-control" id="exampleInputPassword1" placeholder="Email">
                </div>
                <button type="submit" class="btn btn-default">Tallenna</button>
        </div>
    </body>
</html>
