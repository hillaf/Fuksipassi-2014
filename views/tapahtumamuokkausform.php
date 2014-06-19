<body>

    <div class="container">

        <?php if (!empty($data->virheet)): ?>
            <br>
            <?php foreach ($data->virheet as $virhe): ?>
                <div class="alert alert-danger"><?php echo $virhe; ?></div>
            <?php endforeach; ?>

        <?php endif; ?>


        <h1>Muokkaa tietoja: <?php echo htmlspecialchars($data->muokattavatapahtuma->getNimi()); ?></h1>
        <br>
        <div class="lisays">

            <form role="form" action="tapahtumamuokkaus.php" method="POST">
                <div class="form-group">
                    <input type="hidden" class="form-control" name="tapahtumatunnus" id="fuksitunnus" placeholder="Joku uniikki numerosarja" value="<?php echo htmlspecialchars($data->muokattavatapahtuma->getId()); ?>">

                </div>
                <div class="form-group">
                    <label for="nimi">Nimi</label>
                    <input type="text" class="form-control" name="nimi" id="nimi" placeholder="Nimi" value="<?php echo htmlspecialchars($data->muokattavatapahtuma->getNimi()); ?>">
                </div>
                <div class="form-group">
                    <label for="paikka">Paikka</label>
                    <input type="text" class="form-control" name="paikka" id="paikka" placeholder="Paikka" value="<?php echo htmlspecialchars($data->muokattavatapahtuma->getPaikka()); ?>">
                </div>
                <div class="form-group">
                    <label for="pvm">Päivämäärä</label>
                    <input type="date" class="form-control" name="pvm" id="pvm" placeholder="Päivämäärä" value="<?php echo htmlspecialchars($data->muokattavatapahtuma->getPvm()); ?>">
                </div>
                <div class="form-group">
                    <label for="aika">Aika</label>
                    <input type="time" class="form-control" name="aika" id="aika" placeholder="Aika" value="<?php echo htmlspecialchars($data->muokattavatapahtuma->getAika()); ?>">
                </div>
                <div class="form-group">
                    <label for="linkki">Linkki</label>
                    <input type="text" class="form-control" name="linkki" id="linkki" placeholder="Linkki" value="<?php echo htmlspecialchars($data->muokattavatapahtuma->getLinkki()); ?>">
                </div>
                <div class="form-group">
                    <label for="pisteet">Pisteet</label>
                    <input type="text" class="form-control" name="pisteet" id="pisteet" placeholder="Pisteet" value="<?php echo htmlspecialchars($data->muokattavatapahtuma->getPisteet()); ?>">
                </div>
                <div class="form-group">
                    <label for="kuvaus">Kuvaus</label>
                    <textarea class="form-control" rows="4" name="kuvaus" id="pisteet" placeholder="Kuvaus"><?php echo htmlspecialchars($data->muokattavatapahtuma->getKuvaus()); ?></textarea>
                </div>
                <button type="submit" class="btn btn-default">Tallenna</button>

            </form>

        </div>


</body>