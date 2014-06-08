
<body>


    <div class="container">

        <br>
        <div class="ihansama">
        <?php if (!empty($data->virhe)): ?>
            <div class="alert alert-danger"><?php echo $data->virhe; ?></div>
        <?php endif; ?>
        </div>
            
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

                    <tr>
                        <td><?php echo $fuksi->getNimi(); ?></td>
                        <td><?php echo $fuksi->getIrc(); ?></td>
                        <td><?php echo $fuksi->getEmail(); ?></td>
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
                    <input type="text" class="form-control" name="fuksitunnus" id="fuksitunnus" placeholder="Joku uniikki numerosarja">
                </div>
                <div class="form-group">
                    <label for="nimi">Nimi</label>
                    <input type="text" class="form-control" name="nimi" id="nimi" placeholder="Nimi">
                </div>
                <div class="form-group">
                    <label for="irc">Ircnick</label>
                    <input type="text" class="form-control" name="ircnick" id="irc" placeholder="Ircnick">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                </div>
                <button type="submit" class="btn btn-default">Lisää</button>
            </form>

        </div>
    </div>
</div>

</body>