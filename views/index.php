<div class="row">
    <div class="col-md-6">
        <h1>Hei, <?php echo $_SESSION['kirjautunut']; ?></h1>
        <p>Olet kirjautunut sisään.</p>
        <p>
            Fuksipassi-sovelluksessa fuksit voivat merkitä osallistuneensa tapahtumiin ja kerätä näin pisteitä.
            Tutorit voivat vahvistaa osallistumisia ja merkitä fuksille lisäpisteitä fuksitoiminnassa ansioituneille.
            <br>
        </p>
        <p>
            <?php if (isset($_SESSION['tutor'])): ?>
                Hyvät tutorit:
                <br>
                Fuksit eivät näe omia kokonaispisteitään tai tekemistänne merkinnöistä ansaitsemiaan pisteitä.
                He näkevät vain tapahtumista kertyneet pisteet. Voitte lisätä ja muokata tapahtumia.
                
                Jos jotain menee rikki tai pitää parannella tai haluatte antaa palautetta: hihihi@cs.helsinki.fi
            <?php endif ?>
            <?php if (isset($_SESSION['fuksi'])): ?>

            <?php endif ?>
        </p>

        <br>

    </div>

    <!--näytetään tutoreille lista tapahtumista, joissa on vahvistamattomia osallistumisia-->

    <?php if (isset($_SESSION['tutor']) && !empty($data->vahvistamattomatTapahtumat)): ?>
        <div class="col-md-6">

            <br>
            <h4>Seuraavissa tapahtumissa on vahvistamattomia osallistumisia:</h4>
            <br>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Tapahtuma</th>
                        <th>Päivämäärä</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($data->vahvistamattomatTapahtumat as $event): ?>

                        <tr onclick="window.location.href = 'tapahtuma.php?id=<?php echo $event->getId(); ?>';">
                            <td><?php echo htmlspecialchars($event->getNimi()); ?></td>
                            <td><?php echo htmlspecialchars($event->getPvm()); ?></td>
                        </tr>

                    <?php endforeach; ?>

                </tbody>
            </table>

        </div>

        <!--jos vahvistamattomia tapahtumia ei ole-->

    <?php endif ?>
    <?php if (isset($_SESSION['tutor']) && empty($data->vahvistamattomatTapahtumat)): ?>
        <br>
        <h4>Ei vahvistamattomia osallistumisia.</h4>
        <br>
    <?php endif ?>

</div>