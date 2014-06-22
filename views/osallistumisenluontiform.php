<h1>Lisää merkintä fuksille <?php echo $data->fuksi->getNimi(); ?></h1>
<br>
<div class="lisays">

    <form role="form" action="osallistumisenluonti.php" method="POST">

        <div class="form-group">
            <input type="hidden" class="form-control" name="fuksi" id="fuksi" value="<?php echo htmlspecialchars($data->fuksi->getId()); ?>">
            <input type="hidden" class="form-control" name="tutortunnus" id="tutortunnus" value="<?php echo htmlspecialchars($_SESSION['tutor']); ?>">

            <label for="pisteet">Pisteet</label>
            <input type="text" class="form-control" name="pisteet" id="pisteet" placeholder="Pisteet" value="<?php echo htmlspecialchars($data->pisteet); ?>">
        </div>
        <div class="form-group">
            <label for="kuvaus">Kuvaus</label>
            <textarea rows="4" class="form-control" name="kuvaus" id="kuvaus" placeholder="Kuvaus"><?php echo htmlspecialchars($data->kuvaus); ?></textarea>
        </div>
        <button type="submit" class="btn btn-default">Lisää merkintä</button>
    </form>

</div>
