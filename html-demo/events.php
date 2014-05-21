<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="../css/bootstrap.css" rel="stylesheet">
        <link href="../css/bootstrap-theme.css" rel="stylesheet">
        <link href="../css/main.css" rel="stylesheet">
        <title>Fuksipassi 2014</title>

        <script>
            $("#parent").click(function() {
                $("#kid").slideToggle(500);
            });
        </script>

    </head>
    <body>
        <div class="container">
            <nav>
                <ul class="nav nav-pills">
                    <li class="active"><a href="index.php">Etusivu</a></li>
                    <li><a href="my.php">Omat tiedot</a></li>
                    <li><a href="events.php">Tapahtumat</a></li>
                    <li><a href="fuksit.php">Fuksit</a></li>
                    <li><a href="#">Kirjaudu ulos</a></li>
                </ul>
            </nav>

            <h1>Tapahtumat</h1>
            <div class="container">

                <table class="table table-hover table-responsive">
                    <thead>
                        <tr>
                            <th>Tapahtuma</th>
                            <th>Päivä</th>
                            <th>Aika</th>
                            <th>Paikka</th>
                            <th>Kuvaus</th>
                        </tr>
                    </thead>
                    <tbody>
                    <div id="parent">
                        <tr>
                            <td>Fuksibileet</td>
                            <td>1.9.2014</td>
                            <td>18:00</td>
                            <td>Klush</td>
                            <td>Parasta!1</td>
                        </tr>
                    </div>
                    <div id="kid">
                        <tr>
                            <td>
                                Tapahtumainfo.
                            </td>
                        </tr>
                    </div>
                    <tr>

                        <td>Fuksisuunnistus</td>
                        <td>5.9.2014</td>
                        <td>17:00</td>
                        <td>Laitos</td>
                        <td>Vielä parempaa!</td>
                    </tr>


                    </tbody>
                </table>

            </div>
        </div>






    </body>
</html>
