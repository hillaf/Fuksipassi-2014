<h1>Kirjaudu sisään</h1>

<form action="doLogin.php" method="POST">
    <div class="form-group">
        <label for="kayttajatunnus">Käyttäjätunnus</label>
        <input type="text" class="form-control" name="kayttajatunnus" id="kayttajatunnus" placeholder="Käyttäjätunnus" value="<?php echo $data->kayttaja ?>">
    </div>
    <div class="form-group">
        <label for="password">Salasana</label>
        <input type="password" class="form-control" name="salasana" id="salasana" placeholder="Salasana" <?php echo $data->salasana ?>>
    </div>
    <button type="submit" class="btn btn-default">Kirjaudu sisään</button>
</form>
<p>
    <a href="rekisteroityminen.php">Rekisteröidy</a>
</p>

</div>

