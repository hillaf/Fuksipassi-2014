<h1>Rekisteröidy</h1>
<br>
<div class="lisays">

    <form role="form" action="rekisteroidy.php" method="POST">

        <div class="form-group">
            <label for="nimi">Nimi</label>
            <input type="text" class="form-control" name="nimi" id="nimi" placeholder="Nimi" value="<?php echo htmlspecialchars($data->uusiuserNimi); ?>">
        </div>
        <div class="form-group">
            <label for="irc">Ircnick</label>
            <input type="text" class="form-control" name="ircnick" id="irc" placeholder="Ircnick" value="<?php echo htmlspecialchars($data->uusiuserIrc); ?>">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo htmlspecialchars($data->uusiuserEmail); ?>">
        </div>

        <div class="form-group">
            <label for="kayttajatunnus">Käyttäjätunnus</label>
            <input type="text" class="form-control" name="kayttajatunnus" id="kayttajatunnus" placeholder="Käyttäjätunnus" value="<?php echo htmlspecialchars($data->uusiuserKayttaja); ?>">
        </div>

        <div class="form-group">
            <label for="salasana">Salasana</label>
            <input type="password" class="form-control" name="salasana" id="salasana" placeholder="Salasana" value="<?php echo htmlspecialchars($data->uusiuserSalasana); ?>">
        </div>
        <div class="form-group">
            <label for="salasana2">Vahvista salasana</label>
            <input type="password" class="form-control" name="salasana2" id="salasana2" placeholder="Salasana" value="<?php echo htmlspecialchars($data->uusiuserSalasana2); ?>">
        </div>
        <button type="submit" class="btn btn-default">Rekisteröidy</button>
    </form>

</div>
