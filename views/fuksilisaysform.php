<body>

    <div class="container">

        <?php if (!empty($data->virheet)): ?>
            <br>
            <?php foreach ($data->virheet as $virhe): ?>
                <div class="alert alert-danger"><?php echo $virhe; ?></div>
            <?php endforeach; ?>

        <?php endif; ?>


        <h1>Lisää fuksi</h1>
        <br>
        <div class="lisays">

            <form role="form" action="fuksilisays.php" method="POST">
                <div class="form-group">
                    <label for="fuksitunnus">Fuksi-id</label>
                    <input type="text" class="form-control" name="fuksitunnus" id="fuksitunnus" placeholder="Joku uniikki numerosarja" value="<?php echo htmlspecialchars($data->uusifuksiId); ?>">
                </div>
                <div class="form-group">
                    <label for="nimi">Nimi</label>
                    <input type="text" class="form-control" name="nimi" id="nimi" placeholder="Nimi" value="<?php echo htmlspecialchars($data->uusifuksiNimi); ?>">
                </div>
                <div class="form-group">
                    <label for="irc">Ircnick</label>
                    <input type="text" class="form-control" name="ircnick" id="irc" placeholder="Ircnick" value="<?php echo htmlspecialchars($data->uusifuksiIrc); ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo htmlspecialchars($data->uusifuksiEmail); ?>">
                </div>
                <button type="submit" class="btn btn-default">Lisää</button>
            </form>

        </div>
    </div>

</body>