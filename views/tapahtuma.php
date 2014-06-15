<body>
    <div class="container">

        <?php if (isset($_SESSION['ilmoitus'])): ?>
            <br>
            <div class="alert alert-success"><?php echo $_SESSION['ilmoitus']; ?></div>
            <?php unset($_SESSION['ilmoitus']); ?>
        <?php endif; ?>

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



    </div>
</body>