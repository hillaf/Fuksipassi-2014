<h1><?php echo htmlspecialchars($data->naytettavatapahtuma->getNimi()); ?></h1>

<br>

<div class="form-horizontal">

    <form class="form-control-static" role="form">

        <div class="form-group">
            <label class="col-sm-2 control-label">Nimi</label>
            <div class="col-sm-10">
                <p class="form-control-static"><?php echo htmlspecialchars($data->naytettavatapahtuma->getNimi()); ?></p>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Paikka</label>
            <div class="col-sm-10">
                <p class="form-control-static"><?php echo htmlspecialchars($data->naytettavatapahtuma->getPaikka()); ?></p>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Pvm</label>
            <div class="col-sm-10">
                <p class="form-control-static"><?php echo htmlspecialchars($data->naytettavatapahtuma->getPvm()); ?></p>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Aika</label>
            <div class="col-sm-10">
                <p class="form-control-static"><?php echo htmlspecialchars($data->naytettavatapahtuma->getAika()); ?></p>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Linkki</label>
            <div class="col-sm-10">
                <p class="form-control-static"><?php echo htmlspecialchars($data->naytettavatapahtuma->getLinkki()); ?></p>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Pisteet</label>
            <div class="col-sm-10">
                <p class="form-control-static"><?php echo htmlspecialchars($data->naytettavatapahtuma->getPisteet()); ?></p>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Kuvaus</label>
            <div class="col-sm-10">
                <p class="form-control-static"><?php echo htmlspecialchars($data->naytettavatapahtuma->getKuvaus()); ?></p>
            </div>
        </div>
    </form>
</div>

<br>

<!--Hässäkkä, jossa valitaan, näytetäänkö fuksin vai tutorin tietoja. Nää on eri taulussa, siksi tällaista paskaa.
Jatkossa hirveän kiva että voidaan näyttää eri juttuja eri käyttäjille, mutta vittu tää on rumaa-->

<?php if (isset($_SESSION['fuksi'])): ?>

    <?php if ($data->onkoOsallistunut == true): ?>
        <div class="form-group">
            <form class="form-group" role="form" method="POST" action="luoOsallistuminen.php">
                <input type="hidden" name="id" value="<?php echo $data->naytettavatapahtuma->getId(); ?>">
                <button type="submit" class="btn btn-success" disabled="disabled">Olet osallistunut tapahtumaan</button>
            </form>
        </div>
        <div class="form-group">
            <form class="form-group" role="form" method="POST" action="poistaOsallistuminen.php">
                <input type="hidden" name="id" value="<?php echo $data->naytettavatapahtuma->getId(); ?>">
                <button type="submit" class="btn btn-danger">En osallistunutkaan</button>
            </form>
        </div>
    <?php endif ?>

    <?php if ($data->onkoOsallistunut == false): ?>
        <div class="form-group">
            <form class="form-group" role="form" method="POST" action="luoOsallistuminen.php">
                <input type="hidden" name="id" value="<?php echo $data->naytettavatapahtuma->getId(); ?>">
                <button type="submit" class="btn btn-success">Osallistuin</button>
            </form>
        </div>
        <div class="form-group">
            <form class="form-group" role="form" method="POST" action="poistaOsallistuminen.php">
                <input type="hidden" name="id" value="<?php echo $data->naytettavatapahtuma->getId(); ?>">
                <button type="submit" class="btn btn-danger" disabled="disabled">En osallistunut</button>
            </form>
        </div>
    <?php endif ?>

<?php endif ?>


<?php if (isset($_SESSION['tutor'])): ?>
    <div class="form-group">
        <form class="form-group" role="form" method="POST" action="tapahtumapoisto.php">
            <input type="hidden" name="id" value="<?php echo $data->naytettavatapahtuma->getId(); ?>">
            <button type="submit" class="btn btn-default">Poista tapahtuma</button>
        </form>
    </div>
    <div class="form-group">
        <form class="form-group" role="form" method="POST" action="tapahtumamuokkausform.php">
            <input type="hidden" name="id" value="<?php echo $data->naytettavatapahtuma->getId(); ?>">
            <button type="submit" class="btn btn-default">Muokkaa tapahtuman tietoja</button>
        </form>
    </div>
<?php endif ?>

