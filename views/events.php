<h1>Tapahtumat</h1>

<?php if (isset($_SESSION['tutor'])): ?>
    <br>
    <div class="btn-group" id="lisays">
        <div class="form-group">
            <form class="form-group" role="form" action="tapahtumalisaysform.php">
                <button type="submit" class="btn btn-default">Lisää tapahtuma</button>
            </form>
        </div>
    </div>

<?php endif ?>

<br>


<table class="table table-hover">
    <thead>
        <tr>
            <th>Tapahtuma</th>
            <th>Paikka</th>
            <th>Päivämäärä</th>
            <th>Aika</th>
            <th>Pisteet</th>
        </tr>
    </thead>
    <tbody>


        <?php foreach ($data->events as $event): ?>

            <tr onclick="window.location.href = 'tapahtuma.php?id=<?php echo $event->getId(); ?>';">
                <td><?php echo htmlspecialchars($event->getNimi()); ?></td>
                <td><?php echo htmlspecialchars($event->getPaikka()); ?></td>
                <td><?php echo htmlspecialchars($event->getPvm()); ?></td>
                <td><?php echo htmlspecialchars($event->getAika()); ?></td>
                <td><?php echo htmlspecialchars($event->getPisteet()); ?></td>
            </tr>

        <?php endforeach; ?>

    </tbody>
</table>