<h1><?php echo htmlspecialchars($data->naytettavaFuksi->getNimi()); ?></h1>

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
            </form>
        </div>
    </div>

    <div class="col-md-6">
        <br>

        <?php if (isset($_SESSION['tutor'])): ?>
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

                            <tr onclick="window.location.href = 'tapahtuma.php?id=<?php echo $event->getId(); ?>';">
                                <td><?php echo htmlspecialchars($event->getNimi()); ?></td>
                                <td><?php echo htmlspecialchars($event->getPvm()); ?></td>
                                <td><?php echo htmlspecialchars($event->getPisteet()); ?></td>
                            </tr>

                        <?php endforeach; ?>

                    </tbody>
                </table>

            <?php endif ?>
        <?php endif ?>

    </div>
</div>
