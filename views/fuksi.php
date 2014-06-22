<h1><?php echo htmlspecialchars($data->naytettavaFuksi->getNimi()); ?></h1>


<!--fuksin tiedot-->
<br>
<div class="row">
    <div class="col-md-6">

        <div class="form-horizontal">

            <form class="form-control-static" role="form">

                <div class="form-group">
                    <label class="col-sm-2 control-label">Nimi</label>
                    <div class="col-sm-10">
                        <p class="form-control-static"><?php echo htmlspecialchars($data->naytettavaFuksi->getNimi()); ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Irc</label>
                    <div class="col-sm-10">
                        <p class="form-control-static"><?php echo htmlspecialchars($data->naytettavaFuksi->getIrc()); ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                        <p class="form-control-static"><?php echo htmlspecialchars($data->naytettavaFuksi->getEmail()); ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Pisteitä tapahtumista</label>
                    <div class="col-sm-10">
                        <p class="form-control-static"><?php echo htmlspecialchars($data->pisteet); ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Pisteitä yhteensä</label>
                    <div class="col-sm-10">
                        <p class="form-control-static"><?php echo htmlspecialchars($data->pisteetYhteensa); ?></p>
                    </div>
                </div>
            </form>
            <br>

            <?php foreach ($data->fuksinMerkinnat as $merkinta): ?>
                <br>
                <blockquote>
                    <p><?php echo htmlspecialchars($merkinta->getKuvaus()) ?>&nbsp;<span class="badge"><?php echo $merkinta->getPisteet() ?></span></p>
                    <footer><?php echo htmlspecialchars($merkinta->getTutoriid()) ?></cite></footer>
                </blockquote>


            <?php endforeach ?>


        </div>
    </div>

    <!--tapahtumat, joihin fuksi on osallistunut-->

    <div class="col-md-6">
        <br>

        <?php if (empty($data->osallistututTapahtumat)): ?>
            <h4>Fuksi ei ole vielä osallistunut tapahtumiin.</h4>
        <?php endif ?>

        <?php if (!empty($data->osallistututTapahtumat)): ?>
            <h4>Fuksi on osallistunut seuraaviin tapahtumiin:</h4>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Tapahtuma</th>
                        <th>Päivämäärä</th>
                        <th>Pisteet</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($data->osallistututTapahtumat as $event): ?>

                        <tr onclick="window.location.href = 'tapahtuma.php?id
                                                    =<?php echo $event->getId(); ?>';">
                            <td><?php echo htmlspecialchars($event->getNimi()); ?></td>
                            <td><?php echo htmlspecialchars($event->getPvm()); ?></td>
                            <td><?php echo htmlspecialchars($event->getPisteet()); ?></td>
                        </tr>

                    <?php endforeach; ?>

                </tbody>
            </table>

        <?php endif ?>

        <!-- mahdollisuus lisätä fuksille uusia merkintöjä-->

        <br>
        <div class="form-group">
            <form class="form-group" role="form" method="POST" action="osallistumisenluontiform.php">
                <input type="hidden" name="fuksi" value="<?php echo $data->naytettavaFuksi->getId(); ?>">
                <button type="submit" class="btn btn-default">Lisää merkintä</button>
            </form>
        </div>
    </div>

</div>
