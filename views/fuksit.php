
<body>


    <div class="container">


        <br> 

        <?php if (isset($_SESSION['ilmoitus'])): ?>
            <div class="alert alert-success"><?php echo $_SESSION['ilmoitus']; ?></div>
            <?php unset($_SESSION['ilmoitus']); ?>
        <?php endif; ?>


        <?php if (!empty($data->virheet)): ?>

            <?php foreach ($data->virheet as $virhe): ?>
                <div class="alert alert-danger"><?php echo $virhe; ?></div>
            <?php endforeach; ?>

        <?php endif; ?>


        <h1>Fuksit</h1>


        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Nimi</th>
                    <th>Ircnick</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>


                <?php foreach ($data->fuksit as $fuksi): ?>

                    <tr onclick="window.location.href = 'fuksi.php?id=<?php echo $fuksi->getId(); ?>';">
                        <td><?php echo htmlspecialchars($fuksi->getNimi()); ?></td>
                        <td><?php echo htmlspecialchars($fuksi->getIrc()); ?></td>
                        <td><?php echo htmlspecialchars($fuksi->getEmail()); ?></td>
                    </tr>

                <?php endforeach; ?>

            </tbody>
        </table>

        <br>
        <br>
        <div class="lisays">
            <h4>Lisää fuksi</h4>
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