<body>

    <div class="container">

       
        <?php if (!empty($data->virheet)): ?>
            <br>
            <?php foreach ($data->virheet as $virhe): ?>
            <div class="alert alert-danger"><?php echo $virhe; ?></div>
            <?php endforeach; ?>

        <?php endif; ?>
        

        <h1>Lisää tapahtuma</h1>
        <br>
        <div class="lisays">

            <form role="form" action="tapahtumalisays.php" method="POST">

                <div class="form-group">
                    <label for="fuksitunnus">Tapahtuma-id</label>
                    <input type="text" class="form-control" name="tapahtumatunnus" id="fuksitunnus" placeholder="Joku uniikki numerosarja" value="<?php echo htmlspecialchars($data->uusitapahtumaid); ?>">
                </div>       
                <div class="form-group">
                    <label for="nimi">Nimi</label>
                    <input type="text" class="form-control" name="nimi" id="nimi" placeholder="Nimi" value="<?php echo htmlspecialchars($data->uusitapahtumanimi); ?>">
                </div>
                    
                <div class="form-group">
                    <label for="paikka">Paikka</label>
                    <input type="text" class="form-control" name="paikka" id="paikka" placeholder="Paikka" value="<?php echo htmlspecialchars($data->uusitapahtumapaikka); ?>">
                </div>
                <div class="form-group">
                    <label for="pvm">Päivämäärä</label>
                    <input type="date" class="form-control" name="pvm" id="pvm" placeholder="Päivämäärä muodossa yyyy-mm-dd" value="<?php echo htmlspecialchars($data->uusitapahtumapvm); ?>">
                </div>
                <div class="form-group">
                    <label for="aika">Aika</label>
                    <input type="time" class="form-control" name="aika" id="aika" placeholder="Kellonaika muodossa hh:mm" value="<?php echo htmlspecialchars($data->uusitapahtumaaika); ?>">
                </div>
                <div class="form-group">
                    <label for="linkki">Linkki</label>
                    <input type="text" class="form-control" name="linkki" id="linkki" placeholder="Linkki tapahtumakalenteriin" value="<?php echo htmlspecialchars($data->uusitapahtumalinkki); ?>">
                </div>
                <div class="form-group">
                    <label for="pisteet">Pisteet</label>
                    <input type="text" class="form-control" name="pisteet" id="pisteet" placeholder="Pisteet" value="<?php echo htmlspecialchars($data->uusitapahtumapisteet); ?>">
                </div>
                <div class="form-group">
                    <label for="kuvaus">Kuvaus</label>
                    <input type="text" class="form-control" name="kuvaus" id="kuvaus" placeholder="Tapahtuman kuvaus" value="<?php echo htmlspecialchars($data->uusitapahtumakuvaus); ?>">
                </div>
                <button type="submit" class="btn btn-default">Lisää</button>
            </form>

        </div>
    </div>

</body>