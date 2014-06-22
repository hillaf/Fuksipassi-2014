<h1>Lisää tapahtuma</h1>
<br>
<div class="form-group">

    <form role="form" action="tapahtumalisays.php" method="POST">

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
            <textarea rows="4" class="form-control" name="kuvaus" id="kuvaus" placeholder="Tapahtuman kuvaus"><?php echo htmlspecialchars($data->uusitapahtumakuvaus); ?></textarea>
        </div>
        <button type="submit" class="btn btn-default">Lisää</button>
    </form>

</div>
