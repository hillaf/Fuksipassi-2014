<body>

    <div class="container">

        <?php if (!empty($data->virheet)): ?>
            <br>
            <?php foreach ($data->virheet as $virhe): ?>
                <div class="alert alert-danger"><?php echo $virhe; ?></div>
            <?php endforeach; ?>

        <?php endif; ?>


        <h1>Muokkaa tietoja: <?php echo htmlspecialchars($data->muokattavafuksi->getNimi()); ?></h1>
        <br>
        <div class="lisays">

            <form role="form" action="fuksinmuokkaus.php" method="POST">
                <div class="form-group">
                    <input type="hidden" class="form-control" name="fuksitunnus" id="fuksitunnus" placeholder="Joku uniikki numerosarja" value="<?php echo htmlspecialchars($data->muokattavafuksi->getId()); ?>">

                </div>
                <div class="form-group">
                    <label for="nimi">Nimi</label>
                    <input type="text" class="form-control" name="nimi" id="nimi" placeholder="Nimi" value="<?php echo htmlspecialchars($data->muokattavafuksi->getNimi()); ?>">
                </div>
                <div class="form-group">
                    <label for="irc">Ircnick</label>
                    <input type="text" class="form-control" name="ircnick" id="irc" placeholder="Ircnick" value="<?php echo htmlspecialchars($data->muokattavafuksi->getIrc()); ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo htmlspecialchars($data->muokattavafuksi->getEmail()); ?>">
                </div>
                <button type="submit" class="btn btn-default">Tallenna</button>
            </form>

        </div>
    </div>

</body>