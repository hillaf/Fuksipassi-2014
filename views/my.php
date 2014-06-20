<h1>Omat tiedot</h1>

<br>

<div class="form-horizontal">

    <form class="form-control-static" role="form">

        <div class="form-group">
            <label class="col-sm-2 control-label">Käyttäjänimi</label>
            <div class="col-sm-10">
                <p class="form-control-static"><?php echo htmlspecialchars($data->kayttajanimi); ?></p>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Nimi</label>
            <div class="col-sm-10">
                <p class="form-control-static"><?php echo htmlspecialchars($data->hlotiedot->getNimi()); ?></p>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Irc</label>
            <div class="col-sm-10">
                <p class="form-control-static"><?php echo htmlspecialchars($data->hlotiedot->getIrc()); ?></p>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
                <p class="form-control-static"><?php echo htmlspecialchars($data->hlotiedot->getEmail()); ?></p>
            </div>
        </div>

        <?php if (isset($_SESSION['fuksi'])): ?>
            <div class="form-group">
                <label class="col-sm-2 control-label">Pisteet yhteensä</label>
                <div class="col-sm-10">
                    <p class="form-control-static"><?php echo htmlspecialchars($data->pisteet); ?></p>
                </div>
            </div>
        <?php endif ?>
    </form>
</div>
