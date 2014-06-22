<h1>Fuksit</h1>

<br>


<table class="table table-hover">
    <thead>
        <tr>
            <th>Nimi</th>
            <th>Ircnick</th>
            <th>Email</th>
            <th>Pisteet tapahtumista</th>
            <th>Kokonaispisteet</th>
        </tr>
    </thead>
    <tbody>


        <?php foreach ($data->fuksit as $fuksi): ?>

            <tr onclick="window.location.href = 'fuksi.php?id=<?php echo $fuksi->getId(); ?>';">
                <td><?php echo htmlspecialchars($fuksi->getNimi()); ?></td>
                <td><?php echo htmlspecialchars($fuksi->getIrc()); ?></td>
                <td><?php echo htmlspecialchars($fuksi->getEmail()); ?></td>
                <td><?php echo htmlspecialchars($fuksi->getTapahtumaPisteet()); ?></td>
                <td><?php echo htmlspecialchars($fuksi->getPisteet()); ?></td>
            </tr>

        <?php endforeach; ?>

    </tbody>
</table>