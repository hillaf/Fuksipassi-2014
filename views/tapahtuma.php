<h1><?php echo htmlspecialchars($data->naytettavatapahtuma->getNimi()); ?></h1>

<br>

<!--vasemmalla tapahtuman tiedot-->

<div class ="row">
    <div class="col-md-6">
        <div class="form-horizontal">

            <form class="form-control-static" role="form">

                <div class="form-group">
                    <label class="col-sm-2 control-label">Nimi</label>
                    <div class="col-sm-10">
                        <p class="form-control-static"><?php echo htmlspecialchars($data->naytettavatapahtuma->getNimi()); ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Paikka</label>
                    <div class="col-sm-10">
                        <p class="form-control-static"><?php echo htmlspecialchars($data->naytettavatapahtuma->getPaikka()); ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Pvm</label>
                    <div class="col-sm-10">
                        <p class="form-control-static"><?php echo htmlspecialchars($data->naytettavatapahtuma->getPvm()); ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Aika</label>
                    <div class="col-sm-10">
                        <p class="form-control-static"><?php echo htmlspecialchars($data->naytettavatapahtuma->getAika()); ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Linkki</label>
                    <div class="col-sm-10">
                        <p class="form-control-static"><?php echo htmlspecialchars($data->naytettavatapahtuma->getLinkki()); ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Pisteet</label>
                    <div class="col-sm-10">
                        <p class="form-control-static"><?php echo htmlspecialchars($data->naytettavatapahtuma->getPisteet()); ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Kuvaus</label>
                    <div class="col-sm-10">
                        <p class="form-control-static"><?php echo htmlspecialchars($data->naytettavatapahtuma->getKuvaus()); ?></p>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <br>

    <!--oikealla vahvistettavat osallistumiset-->
    <div class="col-md-6">
        <br>
        <?php if (isset($_SESSION['tutor'])): ?>

            <h4>Osallistumiset:</h4>
            <br>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Nimi</th>
                        <th>Ircnick</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>


                    <?php foreach ($data->vahvistamattomatfuksit as $fuksi): ?>

                        <tr>
                            <td><?php echo htmlspecialchars($fuksi->getNimi()); ?></td>
                            <td><?php echo htmlspecialchars($fuksi->getIrc()); ?></td>
                            <td><?php echo htmlspecialchars($fuksi->getEmail()); ?></td>

                            <td>
                                <div class="form-group">
                                    <form class="form-group" role="form" method="POST" action="vahvistaOsallistuminen.php">
                                        <input type="hidden" name="fuksiid" value="<?php echo $fuksi->getId(); ?>">
                                        <input type="hidden" name="tapahtumaid" value="<?php echo $data->naytettavatapahtuma->getId(); ?>">
                                        <button type="submit" class="button btn-success">Vahvista</button>
                                    </form>
                                </div>
                            <td>
                        </tr>

                    <?php endforeach; ?>

                    <?php foreach ($data->vahvistetutfuksit as $fuksi): ?>

                        <tr>
                            <td><?php echo htmlspecialchars($fuksi->getNimi()); ?></td>
                            <td><?php echo htmlspecialchars($fuksi->getIrc()); ?></td>
                            <td><?php echo htmlspecialchars($fuksi->getEmail()); ?></td>

                            <td>
                                <div class="form-group">
                                    <form class="form-group" role="form" method="POST" action="poistaOsallistuminen.php">
                                        <input type="hidden" name="fuksiid" value="<?php echo $fuksi->getId(); ?>">
                                        <input type="hidden" name="tapahtumaid" value="<?php echo $data->naytettavatapahtuma->getId(); ?>">
                                        <button type="submit" class="button btn-alert">Poista osallistuminen</button>
                                    </form>
                                </div>
                            </td>
                        </tr>

                    <?php endforeach; ?>

                </tbody>
            </table>

        </div>

    <?php endif ?>
</div>

<!--alla joko tapahtuman muokkaus/poisto (tutor) tai osallistuminen/peruminen (fuksi)-->


<div class="row">

    <div class="col-md-6">
        <!--Hässäkkä, jossa valitaan, näytetäänkö fuksin vai tutorin tietoja. Nää on eri taulussa, siksi tällaista paskaa.
        Jatkossa hirveän kiva että voidaan näyttää eri juttuja eri käyttäjille, mutta ähh.-->

        <br>

        <?php if (isset($_SESSION['fuksi'])): ?>

            <?php if ($data->onkoOsallistunut == true): ?>
                <div class="form-group">
                    <button type="submit" class="btn btn-success" disabled="disabled">Olet osallistunut tapahtumaan</button>
                </div>
                <div class="form-group">
                    <form class="form-group" role="form" method="POST" action="poistaOsallistuminen.php">
                        <input type="hidden" name="fuksiid" value="<?php echo $_SESSION['fuksi']; ?>">
                        <input type="hidden" name="tapahtumaid" value="<?php echo $data->naytettavatapahtuma->getId(); ?>">
                        <button type="submit" class="btn btn-danger">En osallistunutkaan</button>
                    </form>
                </div>
            <?php endif ?>

            <?php if ($data->onkoOsallistunut == false): ?>
                <div class="form-group">
                    <form class="form-group" role="form" method="POST" action="luoOsallistuminen.php">
                        <input type="hidden" name="id" value="<?php echo $data->naytettavatapahtuma->getId(); ?>">
                        <button type="submit" class="btn btn-success">Osallistuin</button>
                    </form>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-danger" disabled="disabled">En osallistunut</button>
                </div>
            <?php endif ?>

        <?php endif ?>


        <?php if (isset($_SESSION['tutor'])): ?>


            <div class="form-group">
                <form class="form-group" role="form" method="POST" action="tapahtumapoisto.php">
                    <input type="hidden" name="id" value="<?php echo $data->naytettavatapahtuma->getId(); ?>">
                    <button type="submit" class="btn btn-default">Poista tapahtuma</button>
                </form>
            </div>
            <div class="form-group">
                <form class="form-group" role="form" method="POST" action="tapahtumamuokkausform.php">
                    <input type="hidden" name="id" value="<?php echo $data->naytettavatapahtuma->getId(); ?>">
                    <button type="submit" class="btn btn-default">Muokkaa tapahtuman tietoja</button>
                </form>
            </div>

        <?php endif ?>

    </div>
</div>