<h1>Omat tiedot</h1>

<br>

<!--omat tiedot-->

<div class="row">
    <div class="col-md-6">
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

                <!--näytetään fuksille tämän pistesaldo-->
                
                <?php if (isset($_SESSION['fuksi'])): ?>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Pisteitä tapahtumista</label>
                        <div class="col-sm-10">
                            <p class="form-control-static"><?php echo htmlspecialchars($data->pisteet); ?></p>
                        </div>
                    </div>
                <?php endif ?>

            </form>
        </div>
        
        <?php foreach ($data->fuksinMerkinnat as $merkinta): ?>
                <br>
                <blockquote>
                    <p><?php echo htmlspecialchars($merkinta->getKuvaus()) ?></p>
                    <footer><?php echo htmlspecialchars($merkinta->getTutoriid()) ?></cite></footer>
                </blockquote>

            <?php endforeach ?>
        
        
    </div>
    
    <!--näytetään fuksille tapahtumat, joihin hän on osallistunut-->
    
    <div class="col-md-6">
        <br>

        <?php if (isset($_SESSION['fuksi'])): ?>
            <?php if (empty($data->osallistututTapahtumat)): ?>
                <h4>Et ole vielä osallistunut tapahtumiin.</h4>
            <?php endif ?>

            <?php if (!empty($data->osallistututTapahtumat)): ?>
                <h4>Olet osallistunut seuraaviin tapahtumiin:</h4>

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
